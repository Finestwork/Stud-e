<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Modules;
use App\Models\Relations\TeacherClassroom;
use App\Models\Task\Quiz;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function createTask($classUrl){
        if(Auth::guard('teacher')->check()){
            $user = Auth::guard('teacher')->user();
            $classroom = Classroom::where('classroom_unique_url', $classUrl)->get();
            if(count($classroom)>0){
                $classroomBelongsToTeacher = TeacherClassroom::where([
                    ['teacher_id', $user->id],
                    ['classroom_id', $classroom[0]->id]])->get();
                if(count($classroomBelongsToTeacher)>0){
                    $sectionIDs = TeacherClassroom::select('classroom_id')->where('teacher_id', $user->id)->get();
                    foreach($sectionIDs as $sID){
                        $section []= Classroom::select('id', 'classroom_name', 'is_classroom_active')->where('id', $sID->classroom_id)->get()->first();
                    }
                    $modules = Modules::select('id', 'secondary_title')->where('classroom_url', $classUrl)->get();
                    return view('teacher.classroom.Task.create-task',[
                        'user' => $user,
                        'classrooms' => $classroom,
                        'sections' => $section,
                        'modules'=>$modules
                    ]);
                }else{
                    return 'This task does not belong to your classroom';
                }
            }
        }
    }
    public function generateTask(Request $request){
        $validator = Validator::make($request->all(), [
            'settings' => 'required',
            'contents' => 'required',
            'cID' => 'required',
        ]);
        if(!$validator->fails()){
            $totalitems = 0;
            $classroomIDs = [$request->input('cID')];
            $taskType = $request->input('settings')['taskType'];
            $sharedClasses = $request->input('settings')['sharedClasses'];
            foreach($sharedClasses as $sc){
                array_push($classroomIDs, $sc);
            }
            foreach($request->input('contents') as $ct){
                $type = $ct[0];
                if($type === 'fitb'){
                    $totalitems += $ct[3];
                }else if($type === 'la'){
                    $totalitems += $ct[2];
                }else if($type === 'ma' || $type === 'mc'){
                    $totalitems += $ct[4];
                }else if($type === 'id'){
                    $totalitems += $ct[3];
                }
            }
            if($taskType === 'quiz'){
                $quiz = new Quiz();
                $quiz->content = $request->input('contents');
                $quiz->status = 'Assigned';
                $quiz->totalItems = count($request->input('contents'));
                $quiz->maxPoints = $totalitems;
                $quiz->title = $request->input('settings')['taskTitle'];
                $quiz->submodule = $request->input('settings')['underModule'];
                $quiz->timer = $request->input('settings')['timer'];
                $quiz->deadline = date('Y-m-d h:i', strtotime($request->input('settings')['deadline'][0] . ' ' . $request->input('settings')['deadline'][1]));
                $quiz->submission = $request->input('settings')['submission'];
                $quiz->cheatingAttempt = $request->input('settings')['cheatingAttempt'];
                $quiz->instructions = $request->input('settings')['instruction'];
                $quiz->hashedUrl = substr(sha1(date("m-d-Y H:i:s.u").$request->input('settings')['taskTitle']), 10);
                $quiz->classID = $classroomIDs;
                if($quiz->save()){
                    return json_encode(['success'=>true], 200);
                }
            }else if($taskType === 'exam'){

            }else if($taskType === 'seatwork'){

            }else if($taskType === 'project'){

            }else if($taskType === 'assignment'){

            }

        }

        return json_encode(['success'=>false], 500);
    }
    public function renderTask($type, $taskID) {
        if(Auth::guard('teacher')->check()){
            if($type === 'quiz'){
                $user = Auth::guard('teacher')->user();
                $quiz = Quiz::where('hashedUrl', $taskID)->get()->first();
                return view('teacher.classroom.Task.view-task',[
                    'user'=>$user,
                    'quiz'=>$quiz,
                    'type'=>'quiz'
                ]);
            }
        }
        return redirect()->intended('/404/page-does-not-found');
    }
}
