<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index() {
        return view('student.task modules.task_index');
    }

    public function renderTaskInfoPage() {
        return view('student.task modules.task_viewing');
    }

    public function renderTakingATaskPage() {
        return view('student.task modules.task_taking');
    }

    public function renderCommonTask(){
        return view('student.task modules.task_taking_common');
    }

    public function renderEssayTask(){
        return view('student.task modules.task_taking_essay');
    }



}
