<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {

        DB::table('roles')->insert([
            ['name' => 'Register', 'slug' => 'register'],
            ['name' => 'Exam Controller', 'slug' => 'exam-controller'],
            ['name' => 'Dept Office', 'slug' => 'dept-office'],
            ['name' => 'Teacher', 'slug' => 'teacher'],
            ['name' => 'Student', 'slug' => 'student'],
        ]);
    }
}
