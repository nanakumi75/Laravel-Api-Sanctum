<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
          'name' => 'name',
          'email' => 'name@yahoo.com',
          'department' => 'Food and Agriculture',
          'course' => 'Agricultural extension'
        ]);

    }
}
