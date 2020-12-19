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
                'f_name'=>'John',
                'm_name'=>'Dela',
                'l_name'=>'Cruz',
                'email'=>'teacher@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher')->insert(
            [
                'f_name'=>'John',
                'm_name'=>'Dela',
                'l_name'=>'Cruz',
                'email'=>'teacher1@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher')->insert(
            [
                'f_name'=>'Younes',
                'm_name'=>'Padica',
                'l_name'=>'Espiritu',
                'email'=>'teacher2@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher')->insert(
            [
                'f_name'=>'Nicole',
                'm_name'=>'John',
                'l_name'=>'Torres',
                'email'=>'teacher3@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'isSubscribed'=> 0,
                'role_id'=> 2,
                'remember_token'=> null,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
