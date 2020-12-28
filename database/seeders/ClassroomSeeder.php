<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classroom')->insert(
            [
                'classroom_name'=>'Movement or Eurythmy',
                'classroom_section'=>'Free section',
                'classroom_description'=>'This is just a short description of our classroom',
                'class_code'=>'111111',
                'classroom_schedule'=> '[["Monday","7:00 PM - 8:00 PM"],["Thursday","8:00 PM - 9:00 PM"]]',
                'classroom_unique_url'=> sha1('Movement or Eurythmy'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'can_student_download' => 1,
                'can_student_post' => 1,
                'can_student_join' => 1,
                'is_classroom_active' => 1
            ]);
        DB::table('classroom')->insert(
            [
                'classroom_name'=>'Life Lab or gardening',
                'classroom_section'=>'A701',
                'classroom_description'=>'This is just a short description of our classroom',
                'class_code'=>'222222',
                'classroom_schedule'=> '[["Monday","7:00 PM - 8:00 PM"],["Thursday","8:00 PM - 9:00 PM"]]',
                'classroom_unique_url'=> sha1('Life Lab or gardening'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'can_student_download' => 1,
                'can_student_post' => 1,
                'can_student_join' => 1,
                'is_classroom_active' => 1
            ]);
        DB::table('classroom')->insert(
            [
                'classroom_name'=>'Spanish or other foreign language',
                'classroom_section'=>'Free section',
                'classroom_description'=>'This is just a short description of our classroom',
                'class_code'=>'333333',
                'classroom_schedule'=> '[["Monday","7:00 PM - 8:00 PM"],["Thursday","8:00 PM - 9:00 PM"]]',
                'classroom_unique_url'=> sha1('Spanish or other foreign language'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'can_student_download' => 1,
                'can_student_post' => 1,
                'can_student_join' => 1,
                'is_classroom_active' => 1
            ]);
        DB::table('classroom')->insert(
            [
                'classroom_name'=>'Special Education Day Class',
                'classroom_section'=>'Free section',
                'classroom_description'=>'This is just a short description of our classroom',
                'class_code'=>'444444',
                'classroom_schedule'=> '[["Monday","7:00 PM - 8:00 PM"],["Thursday","8:00 PM - 9:00 PM"]]',
                'classroom_unique_url'=> sha1('Special Education Day Class'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'can_student_download' => 1,
                'can_student_post' => 1,
                'can_student_join' => 1,
                'is_classroom_active' => 1
            ]);
        DB::table('classroom')->insert(
        [
            'classroom_name'=>'Adaptive P.E.',
            'classroom_section'=>'Free section',
            'classroom_description'=>'This is just a short description of our classroom',
            'class_code'=>'555555',
            'classroom_schedule'=> '[["Monday","7:00 PM - 8:00 PM"],["Thursday","8:00 PM - 9:00 PM"]]',
            'classroom_unique_url'=> sha1('Adaptive P.E.'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
            'can_student_download' => 1,
            'can_student_post' => 1,
            'can_student_join' => 1,
            'is_classroom_active' => 1
        ]);
        DB::table('classroom')->insert(
            [
                'classroom_name'=>'Spanish or other foreign language',
                'classroom_section'=>'Free section',
                'classroom_description'=>'This is just a short description of our classroom',
                'class_code'=>'666666',
                'classroom_schedule'=> '[["Monday","7:00 PM - 8:00 PM"],["Thursday","8:00 PM - 9:00 PM"]]',
                'classroom_unique_url'=> sha1('Spanish or other foreign language'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'can_student_download' => 1,
                'can_student_post' => 1,
                'can_student_join' => 1,
                'is_classroom_active' => 1
            ]);
    }
}
