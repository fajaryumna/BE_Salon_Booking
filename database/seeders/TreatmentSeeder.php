<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TreatmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data treatments
        DB::table('treatments')->insert([
            [
                'name' => 'Treatment 1',
                'price' => 50000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment1.png',
                'treatment_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 2',
                'price' => 75000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment3.png',
                'treatment_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 3',
                'price' => 85000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment2.png',
                'treatment_category_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 4',
                'price' => 65000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment3.png',
                'treatment_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 5',
                'price' => 75000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment2.png',
                'treatment_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 6',
                'price' => 100000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment1.png',
                'treatment_category_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 7',
                'price' => 100000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment2.png',
                'treatment_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 8',
                'price' => 150000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment1.png',
                'treatment_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Treatment 9',
                'price' => 200000,
                'duration' => 30,
                'image' => 'storage/treatment_images/treatment3.png',
                'treatment_category_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
