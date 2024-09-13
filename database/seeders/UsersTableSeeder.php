<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash; // Import Hash facade

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Insert users
        DB::table('users')->insert([
            'role_id' => 1,
            'name' => 'Md. Register',
            'username' => 'register',
            'email' => 'register@gmail.com',
            'password' => Hash::make('12345678'), // Use Hash::make for password
            'created_at' => now(), // Set created_at
            'updated_at' => now(), // Set updated_at
        ]);

        DB::table('users')->insert([
            'role_id' => 2,
            'name' => 'Md. Exam Controller',
            'username' => 'exam-controller',
            'email' => 'exam-controller@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'role_id' => 3,
            'name' => 'Md. Dept Office',
            'username' => 'dept-office',
            'email' => 'dept-office@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'role_id' => 4,
            'name' => 'Md. Teacher',
            'username' => 'teacher',
            'email' => 'teacher@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'role_id' => 5,
            'name' => 'Md. Student',
            'username' => 'student',
            'email' => 'student@gmail.com',
            'password' => Hash::make('12345678'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
