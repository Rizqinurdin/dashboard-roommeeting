<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::create([
            'id_user' => User::GenerateID(),
            'id_department' => '1',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456'),
            'name' => 'Admin',
            'gender' => 'L',
            'address' => 'Jl. Pahlawan No. 1',
            'phone_number' => '08123456789',
            'place_of_birth' => 'Padang',
            'date_of_birth' => '2000-01-01',
            'role' => 'admin',
        ]);
    }
}
