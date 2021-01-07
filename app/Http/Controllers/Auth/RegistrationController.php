<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\RequestStudent;
use App\Models\Relations\StudentClassroom;
use App\Models\Relations\StudentSubject;
use App\Models\Relations\TeacherSubject;
use App\Models\Subject;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use \App\Http\Controllers\Mail\MailController;

class RegistrationController extends Controller
{

    public function showRegistrationForm() {
        //LATER CHANGE IF USER IS NOT VERIFIED ====== INDEX
        $guards = ['admin', 'teacher', 'student'];
        foreach ($guards as $guard){
            if(Auth::guard($guard)->check()){
                Auth::guard($guard)->logout();
            }
        }
        return view('auth.register');
    }


    public function verifiedUser($url) {
        if(Auth::guard('teacher')->check()){
            Auth::guard('teacher')->logout();
        }else if(Auth::guard('student')->check()){
            Auth::guard('student')->logout();
        }
        $isFound = Teacher::where('verification_url', $url)->get()->first();
        if($isFound){
            $isFound = Teacher::findOrFail($isFound->id);
            $isFound->verified_at = now();
            $isFound->is_verified = 1;
                if($isFound->save()){
                    Auth::guard('teacher')->login($isFound, true);
                    return view('auth.subscription');
                }
        }else{
            $isFound = Student::where('verification_url', $url)->get()->first();
            if($isFound){
                $isFound = Student::findOrFail($isFound->id);
                $isFound->verified_at = now();
                $isFound->is_verified = 1;
                if($isFound->save()){
                    Auth::guard('student')->login($isFound, true);
                    return redirect('/student');
                }
            }
        }
        return view('errors.404');
    }

    public function registerTeacher(Request $request) {
        $validator = Validator::make($request->all(),[
            'teacherFnameTxt'=> 'required',
            'teacherMnameTxt'=> 'required',
            'teacherLnameTxt'=> 'required',
            'teacherEmailTxt'=> 'required|email|unique:teacher,email',
            'teacherPasswordTxt'=> 'required_with:teacherConfirmPasswordTxt|min:6|same:teacherConfirmPasswordTxt',
            'teacherConfirmPasswordTxt'=> 'min:6',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error', 'Something went wrong, please check make sure that all fields are valid.');
        }else{
            $teacher = new Teacher();
            $classroom = new Classroom();
            $teacher->f_name = strtolower($request['teacherFnameTxt']);
            $teacher->m_name = strtolower($request['teacherMnameTxt']);
            $teacher->l_name = strtolower($request['teacherLnameTxt']);
            $teacher->email = $request['teacherEmailTxt'];
            $teacher->password = Hash::make($request['teacherPasswordTxt']);
            $teacher->isSubscribed = 0;
            $teacher->role_id = 2;
            $teacher->is_verified = 0;
            $teacher->verification_url = sha1(time(). strtolower($request['teacherFnameTxt'])).substr(0, 20);
            $teacher->verified_at = "";
            $checkClassCode = $classroom::select('class_code')->where('class_code', $request['teacherClassCodeTxt'])->first();
            if(!$this->isEmailTaken($request['teacherEmailTxt']) && !$checkClassCode){
                if($teacher->save()){
                    $email_data = [
                        'fname'=>strtolower($request['teacherFnameTxt']),
                        'email'=>$request['teacherEmailTxt'],
                        'verification_url' =>$teacher->verification_url
                    ];
                    MailController::sendSignupEmail($email_data);
                    return view('auth.verify', ['user'=>$teacher]);
                }
            }
            return redirect()->back()->with('error', 'Something went wrong, please check make sure that all fields are valid.');
        }
    }
    public function redirectTeacher() {
        return redirect('/signup');
    }
    public function registerStudent(Request $request) {
        $validator = Validator::make($request->all(),[
            'studFnameTxt'=> 'required',
            'studMnameTxt'=> 'required',
            'studLnameTxt'=> 'required',
            'studentEmailTxt'=> 'required|email|unique:student,email',
            'studentPasswordTxt'=> 'required_with:studentConfirmPasswordTxt|min:6|same:studentConfirmPasswordTxt',
            'studentConfirmPasswordTxt'=> 'min:6',
            'studentClassCodeTxt'=> 'required',
        ]);
        if($validator->fails()){
            return redirect()->back()->with('error', 'Something went wrong, please check make sure that all fields are valid.');
        }else{
            $student = new Student();
            $classroom = new Classroom();
            $requestStudent = new RequestStudent();
            $student->f_name = strtolower($request['studFnameTxt']);
            $student->m_name = strtolower($request['studMnameTxt']);
            $student->l_name = strtolower($request['studLnameTxt']);
            $student->email = $request['studentEmailTxt'];
            $student->password = Hash::make($request['studentPasswordTxt']);
            $student->role_id = 3;
            $student->is_verified = 0;
            $student->verification_url = sha1(time(). strtolower($request['studFnameTxt'])).substr(0, 20);
            $student->verified_at = "";
            $class = $classroom::select('id')->where('class_code', $request['studentClassCodeTxt'])->first();
            if(!$this->isEmailTaken($request['studentEmailTxt']) && $class){
                if($student->save()){
                    $requestStudent->student_id = $student->id;
                    $requestStudent->classroom_id = $class->id;
                    if($requestStudent->save()){
                        $user_data = array(
                            'email' => $request->input('studentEmailTxt'),
                            'password' => $request->input('studentPasswordTxt')
                        );
                        if(Auth::guard('student')->attempt($user_data)){
                            $user = Auth::guard('student')->user();
                            $email_data = [
                                'fname'=>strtolower($request['studFnameTxt']),
                                'email'=>$request['studentEmailTxt'],
                                'verification_url' =>$student->verification_url
                            ];
                            MailController::sendSignupEmail($email_data);
                            return view('auth.verify', ['user'=>$user]);
                        }
                    }
                }
            }else{
                return redirect()->back()->with('error', 'It seems like your class code does not exist, please check it.');
            }
            return redirect()->back()->with('error', 'Something went wrong, please check make sure that all fields are valid.');
        }
    }
    public function redirectStudent() {
        return redirect('/signup');
    }
    protected function isEmailTaken($email){
        $teacher = new Teacher();
        $student = new Student();
        $teacherEmail = $teacher::select('email')->where('email', $email)->first();
        $studentEmail = $student::select('email')->where('email', $email)->first();
        if($teacherEmail || $studentEmail){
            return true;
        }else{
            return false;
        }
    }

    //PARTIALS
    public function checkClassCode(Request $request) {
        $subject = new Subject();
        $data = $subject::select('class_code')->where('class_code', $request->input('inputCode'))->first();
        header('Content-Type: application/json');
        if($data){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
    public function checkEmail(Request $request) {
        $isTaken = $this->isEmailTaken($request->input('inputEmail'));
        header('Content-Type: application/json');
        if(!$isTaken){
            echo json_encode(true);
        }else{
            echo json_encode(false);
        }
    }
    public function resendLink(Request $request) {
        $validator = Validator::make($request->all(),[
           'inputUrl'=>'required',
           'inputName'=>'required',
           'inputEmail'=>'required'
        ]);
        if(!$validator->fails()){
            $email_data = [
                'fname'=>$request->input('inputName'),
                'email'=>$request->input('inputEmail'),
                'verification_url' =>$request->input('inputUrl')
            ];
            MailController::sendSignupEmail($email_data);
            return json_encode(['success'=>$email_data], 200);
        }
        return json_encode(['success'=> false], 500);
    }
}
