<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{

    protected $redirectTo = '/student';

    public function index() {
        if(Auth::guard('student')->check()){
            return redirect('/student');
        }else if(Auth::guard('teacher')->check()){
            return redirect('/teacher');
        }
        return view('landing page.index');
    }

    public function showLoginForm(){
        if(Auth::guard('student')->check()){
            return redirect('/student');
        }else if(Auth::guard('teacher')->check()){
            return redirect('/teacher');
        }
        return view('auth.login');
    }

    public function login(Request $request) {
        $user_data = array(
            'email' => $request->input('emailTxt'),
            'password' => $request->input('passwordTxt')
        );
        if(Auth::guard('student')->attempt($user_data, $request->has('rememberMe'))){
            $user = Auth::guard('student')->user();
            Auth::guard('student')->login($user, $request->has('rememberMe'));
            return redirect('/student');
        }else if(Auth::guard('teacher')->attempt($user_data, $request->has('rememberMe'))){
            $user = Auth::guard('teacher')->user();
            Auth::guard('teacher')->login($user, $request->has('rememberMe'));
            return redirect('/teacher');
        }
        return redirect()->back()->with('error', 'Your credentials does not match our records.');
    }
}
