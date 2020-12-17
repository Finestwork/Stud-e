<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\StudentClassroom;
use App\Models\Relations\TeacherClassroom;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassController extends Controller
{
    public function index() {
        $user = Auth::guard('student')->user();
        $classroomId = StudentClassroom::where('student_id', $user->id)->select('classroom_id')->get();
        foreach ($classroomId as $cID){
            $teacherID = TeacherClassroom::where('classroom_id', $cID->classroom_id)->select('teacher_id')->get();
            $classroom = Classroom::where('id', $cID->classroom_id)->get();
        }
        foreach($teacherID as $tID){
            $teacher = Teacher::where('id', $tID->teacher_id)->get();
        }
        return view('student.class module.class_index', [
            'user'=>$user,
            'classrooms' => $classroom,
            'teachers' => $teacher,
        ]);
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
