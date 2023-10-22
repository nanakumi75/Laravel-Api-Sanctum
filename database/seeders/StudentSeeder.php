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
          'name' => 'Akua Mansah',
          'email' => 'akuamansah@yahoo.com',
          'department' => 'Food and Agriculture',
          'course' => 'Agricultural extension'
        ]);

        DB::table('students')->insert([
            'name' => 'Agya Koo',
            'email' => 'agyakoo@gmail.com',
            'department' => 'Agricultural Engineering',
            'course' => 'Extension Officer '
          ]);

          DB::table('students')->insert([
            'name' => 'Boanuaa Francisca',
            'email' => 'francisca@mail.com',
            'department' => 'Teacher Education',
            'course' => 'Basic School Education'
          ]);

          DB::table('students')->insert([
            'name' => 'Kwaku Agyemang Manu',
            'email' => 'agyemang@gmail.com',
            'department' => 'Business Managemnt',
            'course' => 'High School Economics'
          ]);
    }
}
