<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Appointment extends Model
{
    use HasFactory;
    protected $table = 'appointments';
    protected $fillable = [
        'customer_name',
        'customer_email',
        'customer_phone',
        'branch_id',
        'date',
        'start_time',
        'end_time',
        'total_duration',
        'total_price',
    ];

    // Relasi dengan Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    // Relasi dengan Treatments melalui AppointmentTreatment
    public function treatments()
    {
        return $this->belongsToMany(Treatment::class, 'appointment_treatments')
                    ->withPivot('therapist_id', 'price', 'service_fee');
    }

    // Relasi dengan Therapist melalui AppointmentTreatment
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class, 'appointment_treatments')
                    ->withPivot('treatment_id', 'price', 'service_fee');
    }

    public function appointmentTreatments()
    {
        return $this->hasMany(AppointmentTreatments::class);
    }
}
