<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Therapist extends Model
{
    use HasFactory;
    protected $table = 'therapists';
    protected $fillable = [
        'name',
        'service',
        'photo',
        'rating',
        'branch_id',
    ];

    // Relasi dengan Branch
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function treatments()
    {
        return $this->belongsToMany(Treatment::class, 'therapist_treatments');
    }

    // Relasi dengan Appointment melalui AppointmentTreatment
    public function appointments()
    {
        return $this->belongsToMany(Appointment::class, 'appointment_treatments')
                    ->withPivot('treatment_id', 'price', 'service_fee');
    }


}
