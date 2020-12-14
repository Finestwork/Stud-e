<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RenderViewsController extends Controller
{
    public function __construct() {
        $this->middleware('auth:teacher', ['except'=>'logout']);
    }

    public function index() {
        $user = Auth::guard('teacher')->user();
        return view('teacher.index', ['user'=>$user]);
    }
}
