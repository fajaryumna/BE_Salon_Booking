<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        // Membuat role untuk pengguna
        $adminRole = Role::create(['name' => 'admin']);
        $customerRole = Role::create(['name' => 'customer']);

        // Membuat user admin
        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin12345'),
        ]);

        // Membuat user customer
        $userCostumer = User::create([
            'name' => 'Fajar',
            'email' => 'fajaryumna@gmail.com',
            'password' => Hash::make('fajaryumna'),
        ]);
        
        // Assign role ke masing-masing user
        $userAdmin->assignRole($adminRole);
        $userCostumer->assignRole($customerRole);


        //Seeder tabel lain jalankan 1 1 dulu ya
        // $this->call(BranchSeeder::class);
        // $this->call(TreatmentCategorySeeder::class);
        // $this->call(TreatmentSeeder::class);
        // $this->call(TherapistSeeder::class);
        // $this->call(TherapistTreatmentSeeder::class);


    }
}
