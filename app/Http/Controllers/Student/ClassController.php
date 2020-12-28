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
