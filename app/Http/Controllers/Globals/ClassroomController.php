<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\TeacherClassroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClassroomController extends Controller
{
    public function renderClassroom($id) {
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = DB::table('classroom')->where('classroom_unique_url', $id)->get();
            return view('teacher.classroom.schedule',
                [
                    'user' => $user,
                    'classrooms' => $classroom,
                ]);
        }else if(Auth::guard('student')->check()){
            $user = Auth::guard('student')->user();
            $classroom = DB::table('classroom')->where('classroom_unique_url', $id)->get();
            if($classroom->count() !== 0){
                return view('student.class module.schedule',
                    [
                        'user' => $user,
                        'classrooms' => $classroom,
                    ]);
            }
        }
        return view('errors.404');
    }
}
