<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\SignupEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public static function sendSignupEmail($name, $email, $verification_code) {
        $data = [
            'name' => $name,
            'verification_code' => $verification_code,
        ];
        Mail::to($email)->send(new SignupEmail($data));
    }
}
