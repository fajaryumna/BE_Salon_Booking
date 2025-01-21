<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AppointmentTreatments extends Model
{
    use HasFactory;
    protected $table = 'appointment_treatments';
    protected $fillable = [
        'appointment_id', 
        'treatment_id', 
        'therapist_id', 
        'price',
        'service_fee'
    ];

     // Relasi dengan Appointment
     public function appointment()
     {
         return $this->belongsTo(Appointment::class);
     }
 
     // Relasi dengan Treatment
     public function treatment()
     {
         return $this->belongsTo(Treatment::class);
     }
 
     // Relasi dengan Therapist
     public function therapist()
     {
         return $this->belongsTo(Therapist::class);
     }
}
