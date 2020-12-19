<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TeacherClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teacher_classroom')->insert(
            [
                'teacher_id'=> 1,
                'classroom_id'=>1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher_classroom')->insert(
            [
                'teacher_id'=> 1,
                'classroom_id'=>2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher_classroom')->insert(
            [
                'teacher_id'=> 1,
                'classroom_id'=>3,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher_classroom')->insert(
            [
                'teacher_id'=> 1,
                'classroom_id'=>4,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher_classroom')->insert(
            [
                'teacher_id'=> 1,
                'classroom_id'=>5,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        DB::table('teacher_classroom')->insert(
            [
                'teacher_id'=> 1,
                'classroom_id'=>6,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
    }
}
