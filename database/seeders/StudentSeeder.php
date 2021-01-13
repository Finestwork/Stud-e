<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('student')->insert(
            [
                'f_name'=>'Johnny',
                'm_name'=>'Mandalera',
                'l_name'=>'Mauruto',
                'email'=>'student@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'Johnny'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Liam',
                'm_name'=>'Eclie',
                'l_name'=>'Olivia',
                'email'=>'student2@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'Liam'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Noah',
                'm_name'=>'Eclie',
                'l_name'=>'Emmans',
                'email'=>'student3@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). '1231231'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Oliver',
                'm_name'=>'Eclie',
                'l_name'=>'Santos',
                'email'=>'student4@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). '111'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'William',
                'm_name'=>'Eclie',
                'l_name'=>'Sofia',
                'email'=>'student5@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'sqwe2'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Benjamin',
                'm_name'=>'Eclie',
                'l_name'=>'Lucas',
                'email'=>'student6@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'Johnnqwe123y'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Herper',
                'm_name'=>'Eclie',
                'l_name'=>'Ragnarok',
                'email'=>'student7@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'qwe123'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Mason',
                'm_name'=>'Eclie',
                'l_name'=>'Harpy',
                'email'=>'student8@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). '12313r'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'Ethan',
                'm_name'=>'Eclie',
                'l_name'=>'Guttierez',
                'email'=>'student9@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). '1231s'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('student')->insert(
            [
                'f_name'=>'William',
                'm_name'=>'Eclie',
                'l_name'=>'Shakespear',
                'email'=>'student10@gmail.com',
                'password'=> Hash::make('qwe123123'),
                'role_id'=> 3,
                'remember_token'=> null,
                'is_verified' => 1,
                'verification_url' => Hash::make(time(). 'asd12'),
                'verified_at' => now(),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
