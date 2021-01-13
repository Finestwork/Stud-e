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
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = DB::table('teacher_classroom')
                ->join('teacher', 'teacher.id', '=', 'teacher_classroom.teacher_id')
                ->join('classroom', 'teacher_classroom.classroom_id', '=', 'classroom.id')
                ->where([['teacher_id', $user->id], ['is_classroom_active', 1]])
                ->select('classroom_name', 'classroom_schedule', 'classroom_unique_url')
                ->get();
            if(!$user->is_verified){
                Auth::guard('teacher')->logout();
                return redirect()->intended('/signin');
            }else{
                return view('teacher.index', ['user'=>$user, 'classrooms'=>$classroom]);
            }
        }
        return view('auth.login');
    }

    public function classroom() {

    }

}
