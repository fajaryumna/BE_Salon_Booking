<?php

namespace App\Http\Controllers\API;

use Carbon\Carbon;
use App\Models\Branch;
use App\Models\Therapist;
use App\Models\Treatment;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\TreatmentCategory;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController;

class BookingController extends BaseController
{
    /**
     * Mendapatkan daftar branch.
     *
     * @return \Illuminate\Http\Response
     */
    public function getBranchList() {
        $branch = Branch::select('id', 'name', 'address')->get();
        return $this->sendResponse('Branch list successfully retrieved', $branch);
    }

    /**
     * Mendapatkan daftar treatment.
     *
     * @return \Illuminate\Http\Response
     */
    public function getTreatmentList()
    {
        $categories = TreatmentCategory::with('treatments')->get();

        $data = $categories->map(function ($category) {
            return [
                'category_id' => $category->id,
                'category_name' => $category->name,
                'treatments' => $category->treatments->map(function ($treatment) {
                    return [
                        'id' => $treatment->id,
                        'name' => $treatment->name,
                        'price' => $treatment->price,
                        'duration' => $treatment->duration,
                        'image' => $treatment->image,
                    ];
                }),
            ];
        });

        return $this->sendResponse('Treatment list successfully retrieved', $data);
    }

    /**
     * Check available time slots for a given branch, date, and treatments.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function checkAvailableSlots(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',
            'date' => 'required|date|after_or_equal:today',
            'treatments_id' => 'required|array',
            'treatments_id.*' => 'exists:treatments,id',
        ]);

        $branch = Branch::findOrFail($validated['branch_id']);
        $treatments = Treatment::whereIn('id', $validated['treatments_id'])->get();
        $totalDuration = $treatments->sum('duration'); // Total duration of selected treatments

        $startHour = Carbon::parse($branch->start_hour);
        $endHour = Carbon::parse($branch->end_hour);

        if (Carbon::parse($validated['date'])->isToday()) {
            $currentHour = Carbon::now();
            if ($currentHour->gt($startHour)) {
                $startHour = $currentHour->ceilMinute(30); // Membulatkan ke 30 menit berikutnya
            }
        }
        
        $slots = [];

        // Generate time slots with 30-minute intervals
        while ($startHour->lt($endHour)) {
            $slotEnd = $startHour->copy()->addMinutes($totalDuration);

            // Ensure the slot doesn't exceed branch hours
            if ($slotEnd->lte($endHour)) {
                $slots[] = [
                    'start_time' => $startHour->format('H:i'),
                    'end_time' => $slotEnd->format('H:i'),
                ];
            }

            // Move to next slot (after 30 minutes)
            $startHour->addMinutes(30);
        }

        // Check booked slots
        $bookedSlots = Appointment::where('branch_id', $branch->id)
            ->where('date', $validated['date'])
            ->get(['start_time', 'end_time']);        

        // Filter available slots
        $availableSlots = array_filter($slots, function ($slot) use ($bookedSlots) {
            foreach ($bookedSlots as $booked) {
                $bookedStart = Carbon::parse($booked->start_time);
                $bookedEnd = Carbon::parse($booked->end_time);

                $slotStart = Carbon::parse($slot['start_time']);
                $slotEnd = Carbon::parse($slot['end_time']);

                // Check overlap
                if ($slotStart->lt($bookedEnd) && $slotEnd->gt($bookedStart)) {
                    return false; // Slot is not available
                }
            }

            return true; // Slot is available
        });

        return $this->sendResponse('Available slots successfully retrieved', array_values($availableSlots));
    }


    /**
     * Mendapatkan daftar terapis yang tersedia untuk booking berdasarkan branch, tanggal, slot waktu, dan treatment yang dipilih.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getTherapistsByTreatment(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id',  // Memastikan branch_id valid
            'date' => 'required|date|after_or_equal:today', // Validasi tanggal minimal hari ini
            'slot_time' => 'required|string', // Slot waktu dalam format H:i
            'treatments_id' => 'required|array', // Harus berupa array
            'treatments_id.*' => 'exists:treatments,id', // Pastikan ID treatment valid
        ]);

        // Ambil data branch berdasarkan ID
        $branch = Branch::findOrFail($validated['branch_id']);
        
        // Ambil tanggal dan waktu slot yang dipilih
        $date = $validated['date'];
        $slotTime = $validated['slot_time'];
        
        // Tentukan waktu mulai dan selesai berdasarkan slot
        $startTime = Carbon::createFromFormat('H:i', $slotTime);
        $totalDuration = (int) Treatment::whereIn('id', $validated['treatments_id'])->sum('duration'); // Total durasi dari semua treatment
        $endTime = $startTime->copy()->addMinutes($totalDuration);

        // Ambil semua treatment yang diperlukan sekaligus
        $treatments = Treatment::whereIn('id', $validated['treatments_id'])->get(['id', 'name', 'duration']);

        // Hasil akhir untuk menyimpan data treatment dan therapist
        $result = [];

        foreach ($treatments as $treatment) {
            // Ambil therapist yang sesuai dengan treatment, branch, dan waktu
            $therapists = Therapist::where('branch_id', $branch->id) // Filter berdasarkan branch
                ->whereHas('treatments', function ($query) use ($treatment) {
                    $query->where('treatments.id', $treatment->id); // Cek terapis yang menangani treatment tertentu
                })
                ->whereDoesntHave('appointments', function ($query) use ($date, $startTime, $endTime) {
                    $query->where('date', $date) // Tanggal sesuai yang dipesan
                        ->where(function ($query) use ($startTime, $endTime) {
                            $query->whereBetween('start_time', [$startTime->format('H:i'), $endTime->format('H:i')]) // Cek apakah waktu overlap
                                    ->orWhereBetween('end_time', [$startTime->format('H:i'), $endTime->format('H:i')])
                                    ->orWhere(function ($query) use ($startTime, $endTime) {
                                        $query->where('start_time', '<=', $startTime->format('H:i'))
                                            ->where('end_time', '>=', $endTime->format('H:i'));
                                    });
                        });
                })
                ->get(['id', 'name', 'photo', 'service_fee',  'rating']); 

            // Tambahkan data ke hasil akhir
            $result[] = [
                'treatment_id' => $treatment->id,
                'treatment_name' => $treatment->name,
                'treatment_duration' => $treatment->duration,
                'therapists' => $therapists,
            ];
        }

        // Kembalikan hasil dalam format JSON
        return $this->sendResponse('Therapists categorized by treatments successfully retrieved', $result);
    }   


    /**
     * Create a booking for a customer, including treatments and assigned therapists.
     *
     * Validates the request data, calculates the total duration and price, 
     * and creates an appointment record in the database.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * 
     * @throws \Exception if there is an error during booking creation
     */
    public function createBooking(Request $request)
    {
        $validated = $request->validate([
            'branch_id' => 'required|exists:branches,id', 
            'customer_name' => 'required|string',
            'customer_email' => 'required|email',
            'customer_phone' => 'required|string',
            'date' => 'required|date|after_or_equal:today',
            'start_time' => 'required|date_format:H:i',
            'detail' => 'required|array',
            'detail.*.treatment_id' => 'required|exists:treatments,id',
            'detail.*.therapist_id' => 'required|exists:therapists,id',
        ]);

        // Ambil informasi dasar booking
        $branch = Branch::findOrFail($validated['branch_id']);
        $date = $validated['date'];
        $startTime = Carbon::createFromFormat('H:i', $validated['start_time']);
        $totalDuration = 0;
        $totalPrice = 0;

        try {
            DB::beginTransaction();

            // Hitung total durasi dan harga berdasarkan detail booking
            foreach ($validated['detail'] as $detail) {
                $treatment = Treatment::findOrFail($detail['treatment_id']);
                $therapist = Therapist::findOrFail($detail['therapist_id']);

                $totalDuration += $treatment->duration;
                $totalPrice += $treatment->price + $therapist->service_fee;
            }

            // Hitung waktu selesai booking
            $endTime = $startTime->copy()->addMinutes($totalDuration);

            // Buat appointment
            $appointment = Appointment::create([
                'customer_name' => $validated['customer_name'],
                'customer_email' => $validated['customer_email'],
                'customer_phone' => $validated['customer_phone'],
                'branch_id' => $validated['branch_id'],
                'date' => $date,
                'start_time' => $startTime->format('H:i'),
                'end_time' => $endTime->format('H:i'),
                'total_duration' => $totalDuration,
                'total_price' => $totalPrice,
            ]);

            // Tambahkan treatment dan therapist ke appointment
            foreach ($validated['detail'] as $detail) {
                $treatment = Treatment::findOrFail($detail['treatment_id']);
                $therapist = Therapist::findOrFail($detail['therapist_id']);

                $appointment->treatments()->attach($treatment->id, [
                    'therapist_id' => $therapist->id,
                    'price' => $treatment->price,
                    'service_fee' => $therapist->service_fee
                ]);
            }

            DB::commit();

            // Kembalikan respons sukses
            return $this->sendResponse('Booking created successfully', [
                'appointment_id' => $appointment->id,
                'customer_name' => $appointment->customer_name,
                'date' => $appointment->date,
                'start_time' => $appointment->start_time,
                'end_time' => $appointment->end_time,
                'total_duration' => $appointment->total_duration,
                'total_price' => $appointment->total_price,
            ]);

        } catch (Exception $e) {
            DB::rollback();
            return $this->sendError('Terjadi kesalahan saat membuat booking.', [$e->getMessage()], 500);
        }
    }

    public function detailBooking(Request $request, $id)
    {
        $booking = Appointment::with(['appointmentTreatments.therapist', 'appointmentTreatments.treatment', 'branch'])
            ->find($id);
    
        if (!$booking) {
            return $this->sendError('Booking not found', [], 404);
        }

        $formattedBooking = [
            'id' => $booking->id,
            'customer_name' => $booking->customer_name,
            'customer_phone' => $booking->customer_phone,
            'date' => $booking->date,
            'start_time' => $booking->start_time,
            'end_time' => $booking->end_time,
            'total_price' => $booking->total_price,
            'branch' => [
                'id' => $booking->branch->id ?? null,
                'name' => $booking->branch->name ?? null,
            ],
            'treatments' => $booking->appointmentTreatments->map(function ($appointmentTreatment) {
                return [
                    'treatment_name' => $appointmentTreatment->treatment->name ?? null,
                    'treatment_category' => $appointmentTreatment->treatment->category->name ?? null,
                    'treatment_id' => $appointmentTreatment->treatment_id,
                    'therapist_name' => $appointmentTreatment->therapist->name ?? null,
                    'price' => $appointmentTreatment->price,
                    'service_fee' => $appointmentTreatment->service_fee,
                ];
            }),
        ];

        return $this->sendResponse('Booking details', $formattedBooking);
    }

}
