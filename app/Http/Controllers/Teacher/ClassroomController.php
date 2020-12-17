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
}
