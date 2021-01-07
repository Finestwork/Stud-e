<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(){
        if(Auth::guard('student')->check()){
            $user = Auth::guard('student')->user();
            if(!$user->is_verified){
                Auth::guard('student')->logout();
                return redirect()->intended('/signin');
            }else{
                return view('student.index', ['user'=>$user]);
            }
        }
    }




}
