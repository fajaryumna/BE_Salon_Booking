<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Data branches
         DB::table('branches')->insert([
            [
                'name' => 'Tembalang - Semarang',
                'address' => 'Jl. Sirojuddin No.10, Blok 2, Semarang',
                'phone' => '082345678901',
                'start_hour' => '08:00:00',
                'end_hour' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Banyumanik - Semarang',
                'address' => 'Jl. Setiabudi No.20, Blok 2, Semarang',
                'phone' => '082345678901',
                'start_hour' => '08:00:00',
                'end_hour' => '17:00:00',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
