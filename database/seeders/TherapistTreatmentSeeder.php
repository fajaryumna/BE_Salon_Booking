<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TherapistTreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data therapist_treatments
        DB::table('therapist_treatments')->insert([
            // Therapist 1 offers Treatment 1, 2, 3
            [
                'therapist_id' => 1,
                'treatment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 1,
                'treatment_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 1,
                'treatment_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 2 offers Treatment 4, 5, 6
            [
                'therapist_id' => 2,
                'treatment_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 2,
                'treatment_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 2,
                'treatment_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 3 offers Treatment 7, 8, 9
            [
                'therapist_id' => 3,
                'treatment_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 3,
                'treatment_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 3,
                'treatment_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 4 offers Treatment 1, 3
            [
                'therapist_id' => 4,
                'treatment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 4,
                'treatment_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 5 offers Treatment 4, 5, 6
            [
                'therapist_id' => 5,
                'treatment_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 5,
                'treatment_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 6 offers Treatment 7, 8, 9
            [
                'therapist_id' => 6,
                'treatment_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 6,
                'treatment_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 6,
                'treatment_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 7 offers Treatment 1, 2, 3
            [
                'therapist_id' => 7,
                'treatment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 7,
                'treatment_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 7,
                'treatment_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 8 offers Treatment 4, 5, 6
            [
                'therapist_id' => 8,
                'treatment_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 8,
                'treatment_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 8,
                'treatment_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 9 offers Treatment 1, 3
            [
                'therapist_id' => 9,
                'treatment_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 9,
                'treatment_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Therapist 10 offers Treatment 4, 5, 6
            [
                'therapist_id' => 10,
                'treatment_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'therapist_id' => 10,
                'treatment_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
