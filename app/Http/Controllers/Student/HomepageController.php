<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index(){
        if(Auth::guard('student')->check()){
            $user = Auth::guard('student')->user();
            $classroom = DB::table('approved_students')
                ->join('student', 'student.id', '=', 'approved_students.student_id')
                ->join('classroom', 'approved_students.classroom_id', '=', 'classroom.id')
                ->where([['student_id', $user->id], ['is_classroom_active', 1]])
                ->select('classroom_name', 'classroom_schedule', 'classroom_unique_url')
                ->get();
            if(!$user->is_verified){
                Auth::guard('student')->logout();
                return redirect()->intended('/signin');
            }else{
                return view('student.index', ['user'=>$user, 'classrooms'=>$classroom]);
            }
        }
    }




}
