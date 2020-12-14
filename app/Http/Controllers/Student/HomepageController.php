<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(){
        $user = Auth::guard('student')->user();
        return view('student.index', ['user'=>$user]);
    }




}
