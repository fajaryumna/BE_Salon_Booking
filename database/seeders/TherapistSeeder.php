<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TherapistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('therapists')->insert([
            // Data therapists branch 1
            [
                'name' => 'Therapist 1',
                'service_fee' => 20000,
                'photo' => 'storage/therapist_photos/therapist1.png',
                'rating' => 4.5,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 2',
                'service_fee' => 30000,
                'photo' => 'storage/therapist_photos/therapist2.png',
                'rating' => 4.9,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 3',
                'service_fee' => 25000,
                'photo' => 'storage/therapist_photos/therapist3.png',
                'rating' => 4.2,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 4',
                'service_fee' => 20000,
                'photo' => 'storage/therapist_photos/therapist1.png',
                'rating' => 4.1,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 5',
                'service_fee' => 30000,
                'photo' => 'storage/therapist_photos/therapist2.png',
                'rating' => 4.8,
                'branch_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Data therapists branch 2
            [
                'name' => 'Therapist 6',
                'service_fee' => 25000,
                'photo' => 'storage/therapist_photos/therapist3.png',
                'rating' => 4.4,
                'branch_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 7',
                'service_fee' => 25000,
                'photo' => 'storage/therapist_photos/therapist3.png',
                'rating' => 4.2,
                'branch_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 7',
                'service_fee' => 20000,
                'photo' => 'storage/therapist_photos/therapist1.png',
                'rating' => 4.1,
                'branch_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 9',
                'service_fee' => 30000,
                'photo' => 'storage/therapist_photos/therapist2.png',
                'rating' => 4.8,
                'branch_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Therapist 10',
                'service_fee' => 25000,
                'photo' => 'storage/therapist_photos/therapist3.png',
                'rating' => 4.4,
                'branch_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
