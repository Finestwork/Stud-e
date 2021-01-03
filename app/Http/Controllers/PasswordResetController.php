<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Mail\MailController;
use App\Models\ResetPassword;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class PasswordResetController extends Controller
{
    public function validateUserBeforePasswordReset(Request $request) {
        $validator = Validator::make($request->all(),[
            'email'=>'required'
            ]);
        if(!$validator->fails()){
            $email = $request->input('email');
            $retrievedUser = Teacher::select('f_name','email')->where('email', $email)->get()->first();
            if($retrievedUser){
                $this->sendResetLink($retrievedUser->email, $retrievedUser->f_name);
                return json_encode(['success'=>true], 500);
            }else{
                $retrievedUser = Student::select('f_name','email')->where('email', $email)->get()->first();
                if($retrievedUser){
                    $this->sendResetLink($retrievedUser->email, $retrievedUser->f_name);
                    return json_encode(['success'=>true], 500);
                }else{
                    return json_encode(['success'=>false, 'reason'=>'does not exist'], 500);
                }
            }
        }
        return json_encode(['success'=>false, 'reason'=>'failure'], 500);
    }

    public function verifyPasswordLink(Request $request) {
        $validator = Validator::make($request->all(), [
            'password'=> 'required_with:confirmPassword|min:8|same:confirmPassword',
            'confirmPassword'=> 'min:8',
            'url'=>'required'
        ]);
        if(!$validator->fails()){
            $url = $request->input('url');
            $verifiedUrl = ResetPassword::where('token', $url)->get()->first();
            if($verifiedUrl){
                if(!((time()-(60*60*1)) < strtotime($verifiedUrl->token)) && empty($verifiedUrl->verified_at)){
                    $password = $request->input('password');
                    $email = $verifiedUrl->email;
                    $user = Teacher::select('id')->where('email',$email)->get()->first();
                    if($user){
                        $user = Teacher::findOrFail($user->id);
                        $user->password = Hash::make($password);
                        if($user->save()){
                            $currentUser = ResetPassword::findOrFail($verifiedUrl->id);
                            $currentUser->verified_at = now();
                            if($currentUser->save()){
                                return json_encode(['success'=>true], 500);
                            }
                        }
                    }else{
                        $user = Student::select('id')->where('email', $email)->get()->first();
                        if($user){
                            $user = Student::findOrFail($user->id);
                            $user->password = Hash::make($password);
                            if($user->save()){
                                $currentUser = ResetPassword::findOrFail($verifiedUrl->id);
                                $currentUser->verified_at = now();
                                if($currentUser->save()){
                                    return json_encode(['success'=>true], 500);
                                }
                            }
                        }
                    }
                }
            }
        }
        return json_encode(['success'=>false], 500);
    }

    public function displayViewBeforePasswordReset($url) {
        $verifiedUrl = ResetPassword::where('token', $url)->get()->first();
        if($verifiedUrl){
            if(!((time()-(60*60*1)) < strtotime($verifiedUrl->token)) && empty($verifiedUrl->verified_at)){
                return view('auth.passwords.reset', ['url'=>$url]);
            }
        }

        return view('errors.404');
    }
    protected function sendResetLink($userEmail, $userFname){
        $token = sha1(time().$userEmail).substr(0, 20);
        $resetPW = new ResetPassword();
        $resetPW->email = $userEmail;
        $resetPW->token = $token;
        $resetPW->verified_at = "";
        if($resetPW->save()){
            $email_data = [
                'fname'=>$userFname,
                'email'=>$userEmail,
                'token' =>$token
            ];
            MailController::sendPasswordResetLink($email_data);
        }
    }
}
