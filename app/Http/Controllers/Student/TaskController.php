<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index() {
        $user = Auth::guard('student')->user();
        return view('student.task modules.task_index',['user'=>$user]);
    }

    public function renderTaskInfoPage() {
        $user = Auth::guard('student')->user();
        return view('student.task modules.task_viewing',['user'=>$user]);
    }

    public function renderTakingATaskPage() {
        $user = Auth::guard('student')->user();
        return view('student.task modules.task_taking',['user'=>$user]);
    }

    public function renderCommonTask(){
        $user = Auth::guard('student')->user();
        return view('student.task modules.task_taking_common',['user'=>$user]);
    }

    public function renderEssayTask(){
        $user = Auth::guard('student')->user();
        return view('student.task modules.task_taking_essay',['user'=>$user]);
    }



}
