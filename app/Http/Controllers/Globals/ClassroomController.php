<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Modules;
use App\Models\Relations\ApprovedStudent;
use App\Models\Relations\BlockedStudent;
use App\Models\Relations\ModulesPrimaryTitles;
use App\Models\Relations\RequestStudent;
use App\Models\Relations\TeacherClassroom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class ClassroomController extends Controller
{
    public function renderClassroom($id) {
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = Classroom::where('classroom_unique_url', $id)->get();
            return view('teacher.classroom.schedule',
                [
                    'user' => $user,
                    'classrooms' => $classroom,
                ]);
        }else if(Auth::guard('student')->check()){
            $user = Auth::guard('student')->user();
            $classroom = DB::table('classroom')->where('classroom_unique_url', $id)->get();
            if($classroom->count() !== 0){
                return view('student.class module.schedule',
                    [
                        'user' => $user,
                        'classrooms' => $classroom,
                    ]);
            }
        }
        return view('errors.404');
    }
    public function renderModules($id){
        if(Auth::guard('student')->check()){
        }else if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = Classroom::where('classroom_unique_url', $id)->get();
            $primaryTitles = ModulesPrimaryTitles::where('classroom_id', $classroom[0]->id)->get();
            //TEMPORARY
            //IMPLEMENT RETRIEVING OF MODULES AFTERWARDS
            return view('teacher.classroom.modules',
                [
                    'user' => $user,
                    'classrooms' => $classroom,
                    'primaryTitles'=>$primaryTitles
                ]);
        }
        return redirect()->intended('/');
    }

    public function renderClasslist() {
        if($user = Auth::guard('student')->user()){
            $classroomId = ApprovedStudent::where('student_id', $user->id)->select('classroom_id')->get();
            if ($classroomId->count() > 0){
                foreach($classroomId as $cID){
                    $classroom []= DB::table('teacher_classroom')
                        ->join('classroom', 'teacher_classroom.classroom_id', '=', 'classroom.id')
                        ->join('teacher', 'teacher.id', '=', 'teacher_classroom.teacher_id')
                        ->where('classroom_id', $cID->classroom_id)
                        ->select('classroom.created_at', 'teacher.f_name', 'teacher.l_name','classroom_name','classroom_section'
                            ,'classroom_description','classroom_description','classroom_unique_url')
                        ->get();
                }
                return view('student.class module.class_index', [
                    'user'=>$user,
                    'classrooms' => $classroom,
                ]);
            }
            return view('student.class module.class_index', [
                'user'=>$user,
                'classrooms' => 0,
                'teachers' => 0,
            ]);
        }else if($user = Auth::guard('teacher')->user()){
            $classroom = [];
            $user = Auth::guard('teacher')->user();
            $teacherClassrooms = TeacherClassroom::select('classroom_id')->where('teacher_id', $user->id)->get();
            foreach($teacherClassrooms as $tcs){
                $classroom []= Classroom::where('id', $tcs->classroom_id)->get();
            }
            return view('teacher.classroom.index', [
                'user'=>$user,
                'teacherClassroom' => $teacherClassrooms,
                'classrooms' => $classroom
            ]);
        }

    }
    public function checkCode(Request $request) {
        $codes = $request->input('code');
        foreach($codes as $code){
            if(empty($code)){
                return json_encode(['error'=>true]);
            }
        }
        $user = Auth::guard('student')->user();
        $codesNotExist = [];
        $codesSuccess = [];
        $codeUnscuccess = [];
        $requestExist = [];
        $classroomClose = [];
        $requestAlreadyApproved = [];
        $codesBlocked = [];
        foreach($codes as $code){
            $classroom = Classroom::select('class_code', 'id', 'can_student_join')->where('class_code', $code)->first();
            if($classroom){
                if($classroom->can_student_join){
                    $isBlocked = BlockedStudent::select('student_id')->where('classroom_id', $classroom->id)->get()->first();
                    if($isBlocked && $isBlocked->student_id === $user->id){
                        array_push($codesBlocked, $code);
                    }else{
                        $doesRequestExist = RequestStudent::where([
                            ['student_id', $user->id],
                            ['classroom_id', $classroom->id]
                        ])->get()->first();
                        if(!$doesRequestExist){
                            $isApproved = ApprovedStudent::select('student_id')->where('classroom_id', $classroom->id)->get()->first();
                            if(!$isApproved){
                                $requestStudent = new RequestStudent();
                                $requestStudent->student_id = $user->id;
                                $requestStudent->classroom_id = $classroom->id;
                                if($requestStudent->save()){
                                    array_push($codesSuccess, $code);
                                }
                            }else {
                                array_push($requestAlreadyApproved,$code);
                            }
                        }else{
                            array_push($requestExist, $code);
                        }
                    }
                }else{
                    array_push($classroomClose, $code);
                }
            }else{
                array_push($codesNotExist, $code);
            }
        }

        return json_encode([
            'codeNotExist'=>$codesNotExist,
            'codeSuccess'=>$codesSuccess,
            'codeUnsuccess'=>$codeUnscuccess,
            'requestAlreadyApproved'=>$requestAlreadyApproved,
            'requestExist'=>$requestExist,
            'requestIsNotAllowed'=>$classroomClose,
            'codeBlock'=>$codesBlocked
            ]);
    }
}
