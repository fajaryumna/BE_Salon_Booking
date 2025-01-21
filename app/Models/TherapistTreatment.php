<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TherapistTreatment extends Model
{
    use HasFactory;

    protected $table = 'therapist_treatments';

    protected $fillable = [
        'therapist_id',
        'treatment_id',
    ];
}
