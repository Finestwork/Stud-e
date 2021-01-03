<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\PasswordResetEmail;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($user) {
        $email = $user['email'];
        Mail::to($email)->send(new SignupEmail($user));
    }
    public static function sendPasswordResetLink($user) {
        $email = $user['email'];
        Mail::to($email)->send(new PasswordResetEmail($user));
    }
}
