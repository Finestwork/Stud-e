<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mail\MailController;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{



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
            if($user->is_verified){
                return redirect('/student');
            }else{
                Auth::guard('student')->logout();
                return redirect()->back()->with('email', 'Please verify your email address first');
            }
        }else if(Auth::guard('teacher')->attempt($user_data, $request->has('rememberMe'))){
            $user = Auth::guard('teacher')->user();
            Auth::guard('teacher')->login($user, $request->has('rememberMe'));
            if($user->is_verified){
                return redirect('/teacher');
            }else{
                Auth::guard('teacher')->logout();
                return redirect()->back()->with('email');
            }
        }
        return redirect()->back()->with('error', 'Your credentials does not match our records.');
    }

    public function resendEmail() {
        return view('auth.passwords.email');
    }

    public function checkIfEEmailTokenIsValid(Request $request) {
        $validator = Validator::make($request->all(), [
           'email' => 'required'
        ]);
        if(!$validator->fails()){
            $email = $request->input('email');
            $user = Teacher::where('email', $email)->get()->first();
            if($user){
                $email_data = [
                    'fname'=>$user->f_name,
                    'email'=>$user->email,
                    'verification_url' =>$user->verification_url
                ];
                MailController::sendSignupEmail($email_data);
                return json_encode(['success'=>true], 200);
            }else{
                $user = Student::where('email', $email)->get()->first();
                if($user){
                    $user = Student::findOrFail($user->id);
                    $email_data = [
                        'fname'=>$user->f_name,
                        'email'=>$user->email,
                        'verification_url' =>$user->verification_url
                    ];
                    MailController::sendSignupEmail($email_data);
                    return json_encode(['success'=>true], 200);
                }else{
                    return json_encode(['success'=>false, 'reason'=>'does not exist'], 500);
                }
            }
        }

        return json_encode(['success'=>false, 'reason'=>'failure'], 500);
    }
}
