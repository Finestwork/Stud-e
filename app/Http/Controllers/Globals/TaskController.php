<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Task\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function renderTasks($classUrl) {
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = Classroom::where('classroom_unique_url', $classUrl)->get();
            if(count($classroom)>0){
                $quiz = Quiz::select('title','status', 'submodule', 'deadline', 'hashedUrl', 'created_at')->where('classID', 'LIKE', '%'.$classroom[0]->id.'%')->get();
                return view('teacher.classroom.task',
                    [
                        'user' => $user,
                        'classrooms' => $classroom,
                        'quiz' => $quiz
                    ]);
            }
        }else if(Auth::guard('student')->check()){

        }
        return redirect()->intended('/');
    }
}
