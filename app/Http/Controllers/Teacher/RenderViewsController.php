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
            if(!$user->is_verified){
                Auth::guard('teacher')->logout();
                return redirect()->intended('/signin');
            }else{
                return view('teacher.index', ['user'=>$user]);
            }
        }
        return view('auth.login');
    }

    public function classroom() {

    }

}
