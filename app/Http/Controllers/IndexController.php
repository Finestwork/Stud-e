<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() {
        //Soon this will have an authentication to redirect user according to their role
        return view('landing page.index');
    }
}
