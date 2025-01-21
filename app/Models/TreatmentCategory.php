<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TreatmentCategory extends Model
{
    use HasFactory;

    protected $table = 'treatment_categories';
    protected $fillable = [
        'name',
    ];

    public function treatments()
    {
        return $this->hasMany(Treatment::class, 'treatment_category_id');
    }

}
