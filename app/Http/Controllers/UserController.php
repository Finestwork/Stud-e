<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function renderUserProfile() {
        return 'Rendering user profile';
    }

    public function logout() {
        $guards = ['admin', 'teacher', 'student'];
        foreach ($guards as $guard){
            if(Auth::guard($guard)->check()){
                Auth::guard($guard)->logout();
            }
        }
        return redirect()->intended('/signin');
    }
}
