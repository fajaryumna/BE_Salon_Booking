<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Treatment extends Model
{
    use HasFactory;
    
    protected $table = 'treatments';
    protected $fillable = [
        'name',
        'price',
        'duration',
        'image',
        'treatment_category_id',
    ];

    public function category()
    {
        return $this->belongsTo(TreatmentCategory::class, 'treatment_category_id');
    }

    // Relasi dengan Appointment melalui AppointmentTreatment
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_treatments')
                    ->withPivot('therapist_id', 'price', 'service_fee');
    }

    // Relasi dengan Therapists melalui AppointmentTreatment
    public function therapists()
    {
        return $this->belongsToMany(Therapist::class, 'appointment_treatments')
                    ->withPivot('appointment_id', 'price', 'service_fee');
    }



}
