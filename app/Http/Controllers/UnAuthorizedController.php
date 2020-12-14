<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnAuthorizedController extends Controller
{
    public function unauthorized() {
        return view('errors.404');
    }
}
