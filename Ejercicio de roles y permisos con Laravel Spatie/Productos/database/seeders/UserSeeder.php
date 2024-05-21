<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Prueba',
            'email' => 'Prueba@gmail.com',
            'password' => bcrypt('987654321')
        ])->assignRole('SuperAdmin');

        User::create([
            'name' => 'Prueba2',
            'email' => 'Prueba2@gmail.com',
            'password' => bcrypt('987654321')
        ])->assignRole('Admin');
    }
}
