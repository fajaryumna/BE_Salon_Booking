<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TreatmentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Data treatment categories
        DB::table('treatment_categories')->insert([
            [
                'name' => 'Category 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Category 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
