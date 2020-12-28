<?php

namespace App\Http\Controllers\Globals;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Relations\ApprovedStudent;
use App\Models\Relations\BlockedStudent;
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
        $validator = Validator::make($request->all(),[
            'url'=> 'required',
        ]);
        if(!$validator->fails()){
            $url = $request->input('url');
            $classroomID = Classroom::select('id')->where('classroom_unique_url', $url)->get()->first();
            $studIds = RequestStudent::select('student_id')->where('classroom_id', $classroomID->id)->get();
            if(count($studIds) > 0){
                $students = [];
                foreach($studIds as $sID){
                    array_push($students, Student::where('id', $sID->student_id)->get());
                }
                return json_encode([['success'=>true],['students'=>$students]]);
            }
        }
        return json_encode(['success' => false]);
    }
    public function getApprovedMembers(Request $request) {
        header('Content-Type: application/json');
        //PUT VALIDATOR HERE
        $url = $request->input('url');
        $classroomID = Classroom::select('id')->where('classroom_unique_url', $url)->get()->first();
        $studIds = ApprovedStudent::select('student_id')->where('classroom_id', $classroomID->id)->get();
        if(count($studIds) > 0){
            $students = [];
            foreach($studIds as $sID){
                array_push($students, Student::where('id', $sID->student_id)->get());
            }
            return json_encode([['success'=>true],['students'=>$students]]);
        }
        return json_encode(['success' => false]);
    }
    public function getBlockedMembers(Request $request) {
        header('Content-Type: application/json');
        //PUT VALIDATOR HERE
        $url = $request->input('url');
        $classroomID = Classroom::select('id')->where('classroom_unique_url', $url)->get()->first();
        $studIds = BlockedStudent::select('student_id')->where('classroom_id', $classroomID->id)->get();
        if(count($studIds) > 0){
            $students = [];
            foreach($studIds as $sID){
                array_push($students, Student::where('id', $sID->student_id)->get());
            }
            return json_encode([['success'=>true],['students'=>$students]]);
        }
        return json_encode(['success' => false]);
    }

    //ACTIONS
    public function approveMemberRequest(Request $request) {
        header('Content-Type: application/json');
        $validator = Validator::make($request->all(),[
            'id'=> 'required|array|min:1',
        ]);
        if(!$validator->fails()){
            $ids = $request->input('id');
            foreach($ids as $id){
                $selectedData = RequestStudent::where('student_id', (int)$id)->get();
                if(count($selectedData) > 0) {
                    foreach ($selectedData as $sd) {
                        $currentUser = RequestStudent::where([
                            ['classroom_id', $sd->classroom_id],
                            ['student_id', $sd->student_id]
                        ])->first();
                        if ($currentUser) {
                            $approveTable = new ApprovedStudent();
                            $approveTable->student_id = $currentUser->student_id;
                            $approveTable->classroom_id = $currentUser->classroom_id;
                            if ($currentUser->delete()) {
                                if (!$approveTable->save()) {
                                    return json_encode(['success' => false]);
                                }
                            }
                        }
                    }
                }
            }
            return json_encode(['success' => true]);
        }
        return json_encode(['sucess' => false]);
    }
    public function blockMember(Request $request) {
        header('Content-Type: application/json');
        $validator = Validator::make($request->all(),[
            'id'=> 'required|array|min:1',
            'type'=>'required',
            'inputUrl'=> 'required',
        ]);
        $type = $request->input('type');
        if(!$validator->fails()){
            $ids = $request->input('id');
            foreach ($ids as $id){
                if($type === 'fromRequestToBlock'){
                    $selectedData = RequestStudent::where('student_id', (int) $id)->get();
                }else if($type === 'fromAcceptedToBlock'){
                    $selectedData = ApprovedStudent::where('student_id', (int) $id)->get();
                }
                if(count($selectedData) > 0){
                    $blockTable = new BlockedStudent();
                    $blockTable->student_id = $selectedData[0]->student_id;
                    $blockTable->classroom_id = $selectedData[0]->classroom_id;
                    if($type === 'fromRequestToBlock'){
                        $currentUser = RequestStudent::where([
                            ['classroom_id', $selectedData[0]->classroom_id],
                            ['student_id', $selectedData[0]->student_id]
                        ])->get()->first();
                    }else if($type === 'fromAcceptedToBlock'){
                        $currentUser = ApprovedStudent::where([
                            ['classroom_id', $selectedData[0]->classroom_id],
                            ['student_id', $selectedData[0]->student_id]
                        ])->get()->first();
                    }
                    if ($currentUser->delete()){
                        if(!$blockTable->save()){
                            return json_encode(['success'=>false]);
                        }
                    }
                }
            }
            return json_encode(['success'=>true]);
        }
    }
    public function cancelRequest(Request $request) {
        header('Content-Type: application/json');
        $validator = Validator::make($request->all(),[
            'id'=> 'required|array|min:1',
            'inputUrl'=> 'required',
        ]);
        if(!$validator->fails()){
            $ids = $request->input('id');
            foreach($ids as $id){
                $classroomID = Classroom::select('id')->where('classroom_unique_url', $request->input('inputUrl'))->get()->first();
                $currentUser = RequestStudent::where([
                    ['classroom_id', $classroomID->id],
                    ['student_id', (int) $id]
                ])->get()->first();
                if($currentUser->count() > 0) {
                    if (!$currentUser->delete()) {
                        return json_encode(['success' => false]);
                    }
                }
            }
            return json_encode(['success' => true]);
        }
        return json_encode(['sucess' => false]);
    }
    public function removeMember(Request $request) {
        header('Content-Type: application/json');
        $validator = Validator::make($request->all(),[
            'id'=> 'required|array|min:1',
            'inputUrl'=> 'required',
        ]);
        if(!$validator->fails()) {
            $ids = $request->input('id');
            foreach ($ids as $id){
                $classroomID = Classroom::select('id')->where('classroom_unique_url', $request->input('inputUrl'))->get()->first();
                $currentUser = ApprovedStudent::where([
                    ['classroom_id', $classroomID->id],
                    ['student_id', (int) $id]
                ])->get()->first();
                if($currentUser->count() > 0) {
                    if (!$currentUser->delete()) {
                        return json_encode(['success' => false]);
                    }
                }
            }
            return json_encode(['success' => true]);
        }
        return json_encode(['sucess' => false]);
    }
    public function unblockMember(Request $request) {
        header('Content-Type: application/json');
        $validator = Validator::make($request->all(),[
            'id'=> 'required|array|min:1',
            'inputUrl'=> 'required',
        ]);
        if(!$validator->fails()){
            $ids = $request->input('id');
            foreach ($ids as $id){
                $classroomID = Classroom::select('id')->where('classroom_unique_url', $request->input('inputUrl'))->get()->first();
                $currentUser = BlockedStudent::where([
                    ['classroom_id', $classroomID->id],
                    ['student_id', (int) $id]
                ])->get()->first();
                if($currentUser->count() > 0) {
                    if (!$currentUser->delete()) {
                        return json_encode(['success' => false]);
                    }
                }
            }
            return json_encode(['success' => true]);
        }
        return json_encode(['sucess' => false]);
    }
}
