<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher')->insert(
            [
                'f_name'=>'Liam',
                'm_name'=>'Dimero',
                'l_name'=>'Orencia',
                'email'=>'teacher@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'asd'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher')->insert(
            [
                'f_name'=>'John Michael',
                'm_name'=>'Dela',
                'l_name'=>'Cruz',
                'email'=>'teacher1@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'Joaaqw2hnny'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher')->insert(
            [
                'f_name'=>'Roberto',
                'm_name'=>'Sinnawe',
                'l_name'=>'Lipaya',
                'email'=>'teacher2@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). '1231s'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher')->insert(
            [
                'f_name'=>'Roland',
                'm_name'=>'Manalo',
                'l_name'=>'Bautista',
                'email'=>'teacher3@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'qwe1'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
