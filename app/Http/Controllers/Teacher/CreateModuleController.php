<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\Classroom;
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
}
