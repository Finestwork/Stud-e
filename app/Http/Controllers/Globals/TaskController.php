<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function renderTasks($classUrl) {
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = Classroom::where('classroom_unique_url', $classUrl)->get();
            if(count($classroom)>0){
                return view('teacher.classroom.task',
                    [
                        'user' => $user,
                        'classrooms' => $classroom,
                    ]);
            }
        }else if(Auth::guard('student')->check()){

        }
        return redirect()->intended('/');
    }
}
