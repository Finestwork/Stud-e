<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\ApprovedStudent;
use App\Models\Relations\StudentClassroom;
use App\Models\Relations\TeacherClassroom;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassController extends Controller
{
    public function index() {
        $user = Auth::guard('student')->user();
        $classroomId = ApprovedStudent::where('student_id', $user->id)->select('classroom_id')->get();
        if ($classroomId->count() > 0){
            foreach($classroomId as $cID){
                $classroom []= DB::table('teacher_classroom')
                    ->join('classroom', 'teacher_classroom.classroom_id', '=', 'classroom.id')
                    ->join('teacher', 'teacher.id', '=', 'teacher_classroom.teacher_id')
                    ->where('classroom_id', $cID->classroom_id)
                    ->select('classroom.created_at', 'teacher.f_name', 'teacher.l_name','classroom_name','classroom_section'
                        ,'classroom_description','classroom_description','classroom_unique_url')
                    ->get();
            }
            return view('student.class module.class_index', [
                'user'=>$user,
                'classrooms' => $classroom,
            ]);
        }
        return view('student.class module.class_index', [
            'user'=>$user,
            'classrooms' => 0,
            'teachers' => 0,
        ]);

    }
    //TEMPORARY
    public function renderModules() {
        $user = Auth::guard('student')->user();
        return view('student.class module.classroom',['user'=>$user]);
    }
    public function renderTask(){
        $user = Auth::guard('student')->user();
        return view('student.class module.task',['user'=>$user]);
    }
    public function renderDiscussion(){
        $user = Auth::guard('student')->user();
        return view('student.class module.discussion',['user'=>$user]);
    }
    public function renderDiscussionForum() {
        $user = Auth::guard('student')->user();
        return view('student.class module.discussion_forum',['user'=>$user]);
    }

    public function renderCreateDiscussionForum() {
        $user = Auth::guard('student')->user();
        return view('student.class module.discussion_forum_create',['user'=>$user]);
    }
    public function rendermember() {
        $user = Auth::guard('student')->user();
        return view('student.class module.members',['user'=>$user]);
    }
}
