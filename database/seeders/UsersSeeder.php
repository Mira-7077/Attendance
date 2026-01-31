<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name' => 'Admin Teacher',
                'password' => Hash::make('password'),
                'role_id' => 3, // teacher
                'is_admin' => true,
            ]
        );

        User::updateOrCreate(
            ['email' => 'teacher@gmail.com'],
            [
                'name' => 'Ram Teacher',
                'password' => Hash::make('password'),
                'role_id' => 3, // teacher
                'is_admin' => false,
            ]
        );

        User::updateOrCreate(
            ['email' => 'student@gmail.com'],
            [
                'name' => 'Sita Student',
                'password' => Hash::make('password'),
                'role_id' => 2, // student
                'is_admin' => false,
            ]
        );
    }
}
