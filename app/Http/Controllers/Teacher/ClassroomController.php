<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\TeacherClassroom;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClassroomController extends Controller
{
    public function createClassroom(Request $request) {
        $validator = Validator::make($request->all(), [
            'crName'=> 'required',
            'crSection'=> 'required',
            'crDescription'=> 'required',
            'crCode'=> 'required|min:6',
            'crSchedule'=> 'required',
        ]);
        header('Content-Type: application/json');
        if($validator->fails()){
            return response()->json($validator->message(), 500);
        }else{
            $classroom = new Classroom();
            $classroom->classroom_name = $request->input('crName');
            $classroom->classroom_section = $request->input('crSection');
            $classroom->classroom_description = $request->input('crDescription');
            $classroom->class_code = $request->input('crCode');
            $classroom->classroom_schedule = $request->input('crSchedule');
            $classroom->classroom_unique_url = base64_encode($request->input('crName'));
            $classroom->can_student_download = 1;
            $classroom->can_student_post = 1;
            $classroom->can_student_join = 1;
            $classroom->is_classroom_active = 1;
            $doesCodeExist = $classroom::select('class_code')->where('class_code', $request->input('crCode'))->first();
            if($doesCodeExist) {
                return json_encode("Code does exist");
            }else{
                if($classroom->save()){
                    $teacherClassroom = new TeacherClassroom();
                    $teacherClassroom->teacher_id = Auth::guard('teacher')->id();
                    $teacherClassroom->classroom_id = $classroom->id;
                    $teacherClassroom->save();
                    if($teacherClassroom->save()){
                        echo json_encode(true);
                    }else{
                        echo json_encode(false);
                    }
                }
            }
        }
    }
    public function updateClassroom(Request $request) {
        $validator = Validator::make($request->all(), [
            'classroom_name'=> 'required',
            'classroom_section'=> 'required',
            'classroom_description'=> 'required',
            'classroom_unique_url'=>'required',
            'class_code'=> 'required|min:6',
            'classroom_schedule'=> 'required|array',
            'can_student_download'=> 'required|integer',
            'can_student_join'=> 'required|integer',
            'can_student_post'=> 'required|integer',
            'is_classroom_active'=> 'required|integer',
        ]);
        $courseName = $request->input('classroom_name');
        $courseSection = $request->input('classroom_section');
        $courseDescription = $request->input('classroom_description');
        $courseCode = $request->input('class_code');
        $courseSchedule = $request->input('classroom_schedule');
        $canStudentDownloadModules = $request->input('can_student_download');
        $canStudentMakeARequest = $request->input('can_student_join');
        $canStudentMakeApost = $request->input('can_student_post');
        $isClassroomActive = $request->input('is_classroom_active');
        $classUrl = $request->input('classroom_unique_url');
        header('Content-Type: application/json');
        if(!$validator->fails()){
            $fetchedUrl = Classroom::select('id','classroom_unique_url')->where('class_code', $request->input('class_code'))->get()->first();
            if($this->areAllBooleansValid($request->input('can_student_download'),
                $request->input('can_student_join'), $request->input('can_student_post'),
                $request->input('is_classroom_active'))){
                if($fetchedUrl){
                    if ($classUrl === $fetchedUrl->classroom_unique_url){
                        $currentData = Classroom::findOrFail($fetchedUrl->id);
                        $currentData->classroom_name = $courseName;
                        $currentData->classroom_section = $courseSection;
                        $currentData->classroom_description = $courseDescription;
                        $currentData->class_code = $courseCode;
                        $currentData->classroom_schedule = $courseSchedule;
                        if($isClassroomActive){
                            $currentData->can_student_download = $canStudentDownloadModules;
                            $currentData->can_student_post = $canStudentMakeApost;
                            $currentData->can_student_join = $canStudentMakeARequest;
                            $currentData->is_classroom_active = $isClassroomActive;
                        }else{
                            $currentData->can_student_download = 0;
                            $currentData->can_student_post = 0;
                            $currentData->can_student_join = 0;
                            $currentData->is_classroom_active = 0;
                        }
                        if($currentData->save()){
                            return json_encode(["success"=>true, 'items'=>$currentData], 500);
                        }
                    }else{
                        return json_encode(["success"=>false, "reason"=>"code exist"], 500);
                    }
                }else{
                    $id = Classroom::select('id')->where('classroom_unique_url', $classUrl)->get()->first();
                    $currentData = Classroom::findOrFail($id)->first();
                    $currentData->classroom_name = $courseName;
                    $currentData->classroom_section = $courseSection;
                    $currentData->classroom_description = $courseDescription;
                    $currentData->class_code = $courseCode;
                    $currentData->classroom_schedule = $courseSchedule;
                    if($isClassroomActive){
                        $currentData->can_student_download = $canStudentDownloadModules;
                        $currentData->can_student_post = $canStudentMakeApost;
                        $currentData->can_student_join = $canStudentMakeARequest;
                        $currentData->is_classroom_active = $isClassroomActive;
                    }else{
                        $currentData->can_student_download = 0;
                        $currentData->can_student_post = 0;
                        $currentData->can_student_join = 0;
                        $currentData->is_classroom_active = 0;
                    }
                    if($currentData->save()){
                        return json_encode(["success"=>true, 'items'=>$currentData], 500);
                    }
                }
            }
        }
        return json_encode(["success"=>false], 500);
    }
    private function canBeConvertedToBoolean($val){
        if($val >= 0 && $val <= 1){
            return true;
        }
        return false;
    }
    private function areAllBooleansValid($bool1,$bool2,$bool3,$bool4){
        if($this->canBeConvertedToBoolean($bool1) && $this->canBeConvertedToBoolean($bool2) && $this->canBeConvertedToBoolean($bool3) && $this->canBeConvertedToBoolean($bool4)){
            return true;
        }else{
            return false;
        }
    }

    public function checkClassroomCode(Request $request) {
        $validator = Validator::make($request->all(), [
            'inputCode'=> 'required|min:6',
            'inputUrl'=> 'required',
        ]);
        if(!$validator->fails()){
            $fetchedUrl = Classroom::select('classroom_unique_url')->where('class_code', $request->input('inputCode'))->get()->first();
            if($fetchedUrl){
                if($request->input('inputUrl') === $fetchedUrl->classroom_unique_url){
                    json_encode(['success'=>true]);
                }else{
                    json_encode(['success'=>false]);
                }
            }else{
                json_encode(['success'=>true]);
            }

        }
        return json_encode(['success'=>false]);
    }

}
