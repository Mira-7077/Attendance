<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'id' => 1,
                'name' => 'admin',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 2,
                'name' => 'student',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'id' => 3,
                'name' => 'teacher',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}



// namespace Database\Seeders;

// use Illuminate\Database\Seeder;
// use App\Models\Role;

// class RolesSeeder extends Seeder
// {
//     public function run(): void
//     {
//         $roles = ['admin', 'student', 'teacher'];

//         foreach ($roles as $role) {
//             Role::firstOrCreate(
//                 ['name' => $role]
//             );
//         }
//     }
// }
