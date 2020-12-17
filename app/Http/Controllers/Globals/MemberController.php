<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\ApprovedStudent;
use App\Models\Relations\RequestStudent;
use App\Models\Relations\StudentClassroom;
use App\Models\Users\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function renderMembers($id) {
        $students = [];
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = DB::table('classroom')->where('classroom_unique_url', $id)->get();
            $classroomID = Classroom::select('id')->where('classroom_unique_url', $id)->get();
            $studentsID = ApprovedStudent::select('student_id')->where('classroom_id', $classroomID[0]['id'])->get();
            foreach($studentsID as $sID){
                $students []= Student::select('id', 'f_name', 'm_name', 'l_name', 'created_at')->where('id', $sID->student_id)->get();
            }
            return view('teacher.classroom.members',
                [
                    'user' => $user,
                    'students' => $students,
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

    //FETCHING
    public function getMembersRequest(Request $request) {
        header('Content-Type: application/json');
        //PUT VALIDATOR HERE
        $url = $request->input('url');
        $classroomID = Classroom::select('id')->where('classroom_unique_url', $url)->get()->first();
        $studIds = RequestStudent::select('student_id')->where('classroom_id', $classroomID->id)->get();
        if(count($studIds) === 0){
            return json_encode(['response'=>'empty']);
        }else{
            $students = [];
            foreach($studIds as $sID){
                array_push($students, Student::where('id', $sID->student_id)->get());
            }
            return json_encode(['students'=>$students]);
        }
    }

    public function getApprovedMembers(Request $request) {
        header('Content-Type: application/json');
        //PUT VALIDATOR HERE
        $url = $request->input('url');
        $classroomID = Classroom::select('id')->where('classroom_unique_url', $url)->get()->first();
        $studIds = ApprovedStudent::select('student_id')->where('classroom_id', $classroomID->id)->get();
        if(count($studIds) === 0){
            return json_encode(['success' => false]);
        }else{
            $students = [];
            foreach($studIds as $sID){
                array_push($students, Student::where('id', $sID->student_id)->get());
            }
            return json_encode(['students'=>$students]);
        }
    }

    //ACTIONS
    public function approveMemberRequest(Request $request) {
        header('Content-Type: application/json');
        $validator = Validator::make($request->all(),[
            'id'=> 'required',
        ]);
        if(!$validator->fails()){
            $id = $request->input('id');
            $selectedData = RequestStudent::where('student_id', $id)->get();
            if(count($selectedData) > 0) {
                $approveTable = new ApprovedStudent();
                $approveTable->student_id = $selectedData[0]->student_id;
                $approveTable->classroom_id = $selectedData[0]->classroom_id;
                $currentUser = RequestStudent::find($selectedData[0]->student_id);
                if ($currentUser->delete()) {
                    if ($approveTable->save()) {
                        return json_encode(['success' => true]);
                    }
                }
            }
        }
        return json_encode(['sucess' => false]);
    }
}
