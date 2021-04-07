<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'role_id' =>  '1',
            'category_id' => '1',
            'gender' => 'male',
            'phone' => '9856452456',
            'father_name' => 'Test',
            'dob' => Carbon::create('2021', '01', '01'),
            'image' => 'abc.jpg',
            'fname' =>  'Admin',
            'date_of_anniversary' => Carbon::create('2021', '01', '01'),
            'email' =>  'admin@gmail.com',
            'password' =>  bcrypt('Admin@123'),
            'secondary_email' => 'check12@gmail.com',
        ]);

        DB::table('users')->insert([
            'role_id' =>  '2',
            'fname' =>  'User',
            'phone' => '45698876541',
            'category_id' => '1',
            'gender' => 'male',
            'father_name' => 'Test',
            'dob' => Carbon::create('2022', '01', '01'),
            'image' => 'abc.jpg',
            'date_of_anniversary' => Carbon::create('2021', '01', '01'),
            'email' =>  'user@gmail.com',
            'secondary_email' => 'abc@gmail.com',
            'password' =>  bcrypt('User@123'),
        ]);
    }
}
