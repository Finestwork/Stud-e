<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Relations\StudentSubject;
use App\Models\Relations\TeacherSubject;
use App\Models\Subject;
use App\Models\Users\Student;
use App\Models\Users\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegistrationController extends Controller
{

    public function showRegistrationForm() {
        return view('auth.register');
    }

    public function showVerificationEmail() {
        $guards = ['admin', 'teacher', 'student'];
        foreach ($guards as $guard){
            if(Auth::guard($guard)->check()){
                Auth::guard($guard)->logout();
                $user = Auth::guard($guard)->user();
                return view('auth.verify', ['user'=>$user]);
            }
        }
        return redirect('/signup/step-1');
    }

    public function showSubscriptionForm() {
        return view('auth.subscription');
    }

    public function registerTeacher(Request $request) {
        $validator = Validator::make($request->all(),[
            'teacherFnameTxt'=> 'required',
            'teacherMnameTxt'=> 'required',
            'teacherLnameTxt'=> 'required',
            'teacherSubjectTxt'=> 'required',
            'teacherEmailTxt'=> 'required|email|unique:teacher,email',
            'teacherPasswordTxt'=> 'required_with:teacherConfirmPasswordTxt|min:6|same:teacherConfirmPasswordTxt',
            'teacherConfirmPasswordTxt'=> 'min:6',
            'teacherClassCodeTxt'=> 'required',
        ]);

        if($validator->fails()){
            return redirect()->back()->with('ErrorRegistration', 'Something went wrong, please check make sure that all fields are valid.');
        }else{
            $teacher = new Teacher();
            $subject = new Subject();
            $teacherSubject = new TeacherSubject();
            $teacher->f_name = $request['teacherFnameTxt'];
            $teacher->m_name = $request['teacherMnameTxt'];
            $teacher->l_name = $request['teacherLnameTxt'];
            $teacher->email = $request['teacherEmailTxt'];
            $teacher->password = Hash::make($request['teacherPasswordTxt']);
            $teacher->isSubscribed = 0;
            $teacher->role_id = 2;

            $checkClassCode = $subject::select('class_code')->where('class_code', $request['teacherClassCodeTxt'])->first();
            if(!$this->isEmailTaken($request['teacherEmailTxt']) && !$checkClassCode){
                $subject->subject_name = $request['teacherSubjectTxt'];
                $subject->class_code = $request['teacherClassCodeTxt'];
                if($teacher->save() && $subject->save()){
                    $teacherSubject->teacher_id = $teacher->id;
                    $teacherSubject->subject_id = $subject->id;
                    if($teacherSubject->save()){
                        $user_data = array(
                            'email' => $request->input('teacherEmailTxt'),
                            'password' => $request->input('teacherPasswordTxt')
                        );
                        if(Auth::guard('teacher')->attempt($user_data)){
                            return redirect()->intended('/signup/step-2');
                        }
                    }
                }
            }
            return redirect()->back()->with('ErrorRegistration', 'Something went wrong, please check make sure that all fields are valid.');
        }
    }
    public function redirectTeacher() {
        return redirect('/signup/step-1');
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
            return redirect()->back()->with('ErrorRegistration', 'Something went wrong, please check make sure that all fields are valid.');
        }else{
            $student = new Student();
            $subject = new Subject();
            $studentSubject = new StudentSubject();
            $student->f_name = $request['studFnameTxt'];
            $student->m_name = $request['studMnameTxt'];
            $student->l_name = $request['studLnameTxt'];
            $student->email = $request['studentEmailTxt'];
            $student->password = Hash::make($request['studentPasswordTxt']);
            $student->role_id = 3;
            $class = $subject::select('id')->where('class_code', $request['studentClassCodeTxt'])->first();
            if(!$this->isEmailTaken($request['studentEmailTxt']) && $class){
                if($student->save()){
                    $studentSubject->student_id = $student->id;
                    $studentSubject->subject_id = $class->id;
                    if($studentSubject->save()){
                        $user_data = array(
                            'email' => $request->input('studentEmailTxt'),
                            'password' => $request->input('studentPasswordTxt')
                        );
                        if(Auth::guard('student')->attempt($user_data)){
                            return redirect()->intended('/signup/step-2');
                        }
                    }
                }
            }else{
                return redirect()->back()->with('ErrorRegistration', 'It seems like your class code does not exist, please check it.');
            }
            return redirect()->back()->with('ErrorRegistration', 'Something went wrong, please check make sure that all fields are valid.');
        }
    }
    public function redirectStudent() {
        return redirect('/signup/step-1');
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

}
