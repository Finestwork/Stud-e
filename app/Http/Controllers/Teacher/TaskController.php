<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Modules;
use App\Models\Relations\TeacherClassroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function createTask($classUrl) {
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = Classroom::where('classroom_unique_url', $classUrl)->get();
            if(count($classroom)>0){
                $classroomBelongsToTeacher = TeacherClassroom::where([
                    ['teacher_id', $user->id],
                    ['classroom_id', $classroom[0]->id]])->get();
                if(count($classroomBelongsToTeacher)>0){
                    $sectionIDs = TeacherClassroom::select('classroom_id')->where('teacher_id', $user->id)->get();
                    foreach($sectionIDs as $sID){
                        $section []= Classroom::select('id', 'classroom_name', 'is_classroom_active')->where('id', $sID->classroom_id)->get()->first();
                    }
                    $modules = Modules::select('id', 'secondary_title')->where('classroom_url', $classUrl)->get();
                    return view('teacher.classroom.Task.create-task',[
                        'user' => $user,
                        'classrooms' => $classroom,
                        'sections' => $section,
                        'modules'=>$modules
                    ]);
                }else{
                    return 'This task does not belong to your classroom';
                }
            }
        }
    }
}
