<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\StudentClassroom;
use App\Models\Relations\TeacherClassroom;
use App\Models\Relations\TeacherSubject;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RenderViewsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:teacher', ['except'=>'logout']);
    }

    public function index() {
        $user = Auth::guard('teacher')->user();
        return view('teacher.index', ['user'=>$user]);
    }

    public function classroom() {
        $classroom = [];
        $user = Auth::guard('teacher')->user();
        $teacherClassrooms = TeacherClassroom::select('classroom_id')->where('teacher_id', $user->id)->get();

        foreach($teacherClassrooms as $tcs){
            $classroom []= Classroom::where('id', $tcs->classroom_id)->get();
        }
        return view('teacher.classroom.index', [
            'user'=>$user,
            'teacherClassroom' => $teacherClassrooms,
            'classrooms' => $classroom
        ]);
    }

}
