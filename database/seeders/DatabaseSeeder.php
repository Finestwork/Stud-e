<?php

namespace Database\Seeders;

use App\Models\User\TeacherModel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
           RolesSeeder::class,
            TeacherSeeder::class,
            ClassroomSeeder::class,
            TeacherClassroomSeeder::class,
            StudentSeeder::class,
            RequestStudentsSeeder::class
        ]);
    }
}
