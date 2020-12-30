<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
use App\Models\Modules;
use App\Models\Relations\ModulesPrimaryTitles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CreateModuleController extends Controller
{
    public function createPrimaryTitle(Request $request) {
        $validator = Validator::make($request->all(), [
           'url'=>'required',
           'primaryTitle' => 'required',
        ]);
        if(!$validator->fails()){
            $classUrl = $request->input('url');
            $primaryTitle = $request->input('primaryTitle');
            $currentID = $request->input('id');
            $doesTitleAlreadyExist = ModulesPrimaryTitles::where('id', (int) $currentID)->get()->first();
            if($doesTitleAlreadyExist){
                $currentClassroom = Classroom::select('id')->where('classroom_unique_url', $classUrl)->get()->first();
                $doesTitleAlreadyExist->classroom_id = $currentClassroom->id;
                $doesTitleAlreadyExist->module_primary_title = $primaryTitle;
                if($doesTitleAlreadyExist->save()){
                    return json_encode(['success'=>true, 'id'=>$doesTitleAlreadyExist->id], 200);
                }
            }else{
                $newData = new ModulesPrimaryTitles();
                $currentClassroom = Classroom::select('id')->where('classroom_unique_url', $classUrl)->get()->first();
                $newData->classroom_id = $currentClassroom->id;
                $newData->module_primary_title = $primaryTitle;
                if($newData->save()){
                    return json_encode(['success'=>true, 'id'=>$newData->id], 200);
                }
            }

        }
        return json_encode(['success'=>false], 500);
    }
    public function deletePrimaryTitle(Request $request) {
        $validator = Validator::make($request->all(), [
            'primaryTitleID' => 'required'
        ]);
        if(!$validator->fails()){
            $primaryTitleID = $request->input('primaryTitleID');
            $modules = Modules::where('primary_title_id', $primaryTitleID)->get();
            if(count($modules) !== 0){
                foreach($modules as $md){
                    $currentModule = Modules::findOrFail($md->id);
                    if (!$currentModule->delete()){
                        return json_encode(['success'=>false,'reason'=>'deleting a module does not succeed.'], 500);
                    }
                }
                $module = ModulesPrimaryTitles::findOrFail((int) $primaryTitleID);
                if($module->delete()){
                    return json_encode(['success'=>true], 200);
                }
            }else{
                $module = ModulesPrimaryTitles::findOrFail((int) $primaryTitleID);
                if($module->delete()){
                    return json_encode(['success'=>true], 200);
                }
            }
        }
        return json_encode(['success'=>false], 500);
    }
    public function createModule(Request $request) {
        $validator = Validator::make($request->all(), [
           'primaryID' => 'required',
           'classroomUrl' => 'required',
           'title' => 'required',
           'description' => 'required',
        ]);
        if(!$validator->fails()){
            $primaryID = $request->input('primaryID');
            $classroomUrl = $request->input('classroomUrl');
            $secondaryTitle = $request->input('title');
            $description = $request->input('description');
            $audio = $request->input('audio');
            $document = $request->input('document');
            $image = $request->input('image');
            $pdf = $request->input('pdf');
            $video = $request->input('video');
            $externalLinks = $request->input('external_links');

            $modules = new Modules();
            $modules->secondary_title = $secondaryTitle;
            $modules->description = $description;
            $modules->classroom_url = $classroomUrl;
            $modules->primary_title_id = (int) $primaryID;
            $modules->audio_id = $audio;
            $modules->video_id = $video;
            $modules->image_id = $image;
            $modules->document_id = $document;
            $modules->pdf_id = $pdf;
            $modules->external_links = $externalLinks;
            if($modules->save()){
                return json_encode(['success'=>true], 500);
            }
        }
        return json_encode(['success'=>false], 500);
    }
    public function updateModule(Request $request) {
        $validator = Validator::make($request->all(), [
            'moduleID' => 'required',
            'classroomUrl' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);
        if(!$validator->fails()){
            $moduleID = $request->input('moduleID');
            $classroomUrl = $request->input('classroomUrl');
            $secondaryTitle = $request->input('title');
            $description = $request->input('description');
            $audio = $request->input('audio');
            $document = $request->input('document');
            $image = $request->input('image');
            $pdf = $request->input('pdf');
            $video = $request->input('video');
            $externalLinks = $request->input('external_links');

            $modules = Modules::findOrFail((int) $moduleID);
            $modules->secondary_title = $secondaryTitle;
            $modules->description = $description;
            $modules->classroom_url = $classroomUrl;
            $modules->audio_id = $audio;
            $modules->video_id = $video;
            $modules->image_id = $image;
            $modules->document_id = $document;
            $modules->pdf_id = $pdf;
            $modules->external_links = $externalLinks;
            if($modules->save()){
                return json_encode(['success'=>true], 500);
            }
        }
        //return json_encode(['success'=>false], 500);
        return json_encode(['success'=>$request->all()], 500);
    }
    public function deleteModule(Request $request) {
        $validator = Validator::make($request->all(), [
           'moduleID' => 'required'
        ]);
        if(!$validator->fails()){
            $moduleID = $request->input('moduleID');
            $module = Modules::findOrFail((int) $moduleID);
            if($module->delete()){
                return json_encode(['success'=>true], 200);
            }
        }
        return json_encode(['success'=>false], 500);
    }
}
