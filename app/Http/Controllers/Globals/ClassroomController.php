<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\ApprovedStudent;
use App\Models\Relations\BlockedStudent;
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
        $requestAlreadyApproved = [];
        $codesBlocked = [];
        foreach($codes as $code){
            $classroom = Classroom::select('class_code', 'id')->where('class_code', $code)->first();
            if($classroom){
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
                array_push($codesNotExist, $code);
            }
        }

        return json_encode(
            ['codeNotExist'=>$codesNotExist,
                'codeSuccess'=>$codesSuccess,
                'codeUnsuccess'=>$codeUnscuccess,
                'requestAlreadyApproved'=>$requestAlreadyApproved,
                'requestExist'=>$requestExist,
                'codeBlock'=>$codesBlocked
            ]);
    }
}
