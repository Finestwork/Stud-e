<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index() {
        return view('student.class module.class_index');
    }

    public function renderClassroom(){
        return view('student.class module.classroom');
    }
    public function renderTask(){
        return view('student.class module.task');
    }
    public function renderDiscussion(){
        return view('student.class module.discussion');
    }
    public function renderDiscussionForum() {
        return view('student.class module.discussion_forum');
    }
    public function rendermember() {
        return view('student.class module.members');
    }
}
