<?php

namespace App\Http\Controllers;

use App\Models\AudioStorage;
use App\Models\DocumentStorage;
use App\Models\ImageStorage;
use App\Models\PdfStorage;
use App\Models\VideoStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UploadController extends Controller
{
    protected $modules = [];
    public function validateUploadedFiles(Request $request){
        $files = $request->file();
        $authorID = Auth::guard('teacher')->id();
        //WILL IMPLEMENT LATER
        $validator = Validator::make($request->all(), [
           'file' => 'mimes:jpeg,jpg,png,gif,audio/mpeg,mpga,mp3,wav,mov,mpg,mpeg,mp4,wmv,flv,f4v,pdf,doc,docx,pptx,ppt,xls,xlsx'
        ]);
        if(!empty($files)){
            $path = null;
            foreach ($files as $file){
                $fileNewName = sha1(date("m-d-Y H:i:s.u").$file->getClientOriginalName()).'.'.$file->getClientOriginalExtension();
                if(substr($file->getMimeType(), 0, 5) == 'image'){
                    Storage::put('public/img/'. $fileNewName, file_get_contents($file));
                    $path = '/storage/img/'. $fileNewName;
                    $imgStorage = new ImageStorage();
                    $imgStorage->storage_path = $path;
                    $imgStorage->original_path = 'public/img/'. $fileNewName;
                    $imgStorage->teacher_id = $authorID;
                    $imgStorage->hashed_name = $fileNewName;
                    $imgStorage->original_name = $file->getClientOriginalName();
                    if($imgStorage->save()){
                        return json_encode(['success'=>true, 'path'=>$path,'type'=>'image', 'id'=>$imgStorage->id], 200);
                    }
                }
                if(substr($file->getMimeType(), 0, 5) == 'audio'){
                    Storage::put('public/audio/'.$fileNewName, file_get_contents($file));
                    $path = '/storage/audio/'.$fileNewName;
                    $audioStorage = new AudioStorage();
                    $audioStorage->storage_path = $path;
                    $audioStorage->original_path = 'public/audio/'. $fileNewName;
                    $audioStorage->teacher_id = $authorID;
                    $audioStorage->hashed_name = $fileNewName;
                    $audioStorage->original_name = $file->getClientOriginalName();
                    if($audioStorage->save()){
                        return json_encode(['success'=>true, 'path'=>$path,'type'=>'audio', 'id'=>$audioStorage->id], 200);
                    }
                }
                if($file->getMimeType() == 'video/webm' || $file->getMimeType() == 'application/mp4'
                    || $file->getMimeType() == 'video/mp4' || $file->getMimeType() == 'video/ogg' ){
                    Storage::put('public/video/'.$fileNewName, file_get_contents($file));
                    $path = '/storage/video/'.$fileNewName;
                    $videoStorage = new VideoStorage();
                    $videoStorage->storage_path = $path;
                    $videoStorage->original_path = 'public/video/'. $fileNewName;
                    $videoStorage->teacher_id = $authorID;
                    $videoStorage->hashed_name = $fileNewName;
                    $videoStorage->original_name = $file->getClientOriginalName();
                    if($videoStorage->save()){
                        return json_encode(['success'=>true, 'path'=>$path,'type'=>'video', 'id'=>$videoStorage->id], 200);
                    }
                }
                if($file->getMimeType() === 'application/pdf'){
                    Storage::put('public/pdf/'.$fileNewName, file_get_contents($file));
                    $path = '/storage/pdf/'.$fileNewName;
                    $pdfStorage = new PdfStorage();
                    $pdfStorage->storage_path = $path;
                    $pdfStorage->original_path = 'public/pdf/'. $fileNewName;
                    $pdfStorage->teacher_id = $authorID;
                    $pdfStorage->hashed_name = $fileNewName;
                    $pdfStorage->original_name = $file->getClientOriginalName();
                    if($pdfStorage->save()){
                        return json_encode(['success'=>true, 'path'=>$path,'type'=>'pdf', 'id'=>$pdfStorage->id], 200);
                    }
                }

                if($this->isDocumentValid($file->getMimeType())){
                    Storage::put('public/document/'.$fileNewName, file_get_contents($file));
                    $path = '/storage/document/'.$fileNewName;
                    $documentStorage = new DocumentStorage();
                    $documentStorage->storage_path = $path;
                    $documentStorage->original_path = 'public/document/'. $fileNewName;
                    $documentStorage->teacher_id = $authorID;
                    $documentStorage->hashed_name = $fileNewName;
                    $documentStorage->original_name = $file->getClientOriginalName();
                    if($documentStorage->save()){
                        return json_encode(['success'=>true, 'path'=>$path,'type'=>'document', 'id'=>$documentStorage->id], 200);
                    }
                }
            }
        }
        //return json_encode(['success'=>$file->getMimeType()], 500);
        return json_encode(['success'=>false], 500);
    }


    public function deleteUpload(Request $request) {
        $validator = Validator::make($request->all(),[
           'url' => 'required',
            'fileType' => 'required'
        ]);
        if(!$validator->fails()){
            $fileType = $request->input('fileType');
            $url = $request->input('url');
            $userID = Auth::guard('teacher')->id();
            if($fileType === 'image'){
                $doesIDMatch = ImageStorage::where([['teacher_id', $userID], ['storage_path', $url]])->get()->first();
                if(Storage::delete(stripcslashes($doesIDMatch->original_path))){
                    if($doesIDMatch->delete()){
                        return json_encode(['success'=>true]);
                    }
                }
            }else if($fileType === 'audio'){
                $doesIDMatch = AudioStorage::where([['teacher_id', $userID], ['storage_path', $url]])->get()->first();
                if(Storage::delete(stripcslashes($doesIDMatch->original_path))){
                    if($doesIDMatch->delete()){
                        return json_encode(['success'=>true]);
                    }
                }
            }else if($fileType === 'video'){
                $doesIDMatch = VideoStorage::where([['teacher_id', $userID], ['storage_path', $url]])->get()->first();
                if(Storage::delete(stripcslashes($doesIDMatch->original_path))){
                    if($doesIDMatch->delete()){
                        return json_encode(['success'=>true]);
                    }
                }
            }else if($fileType === 'pdf'){
                $doesIDMatch = PdfStorage::where([['teacher_id', $userID], ['storage_path', $url]])->get()->first();
                if(Storage::delete(stripcslashes($doesIDMatch->original_path))){
                    if($doesIDMatch->delete()){
                        return json_encode(['success'=>true]);
                    }
                }
            }else if($fileType === 'document'){
                $doesIDMatch = DocumentStorage::where([['teacher_id', $userID], ['storage_path', $url]])->get()->first();
                if(Storage::delete(stripcslashes($doesIDMatch->original_path))){
                    if($doesIDMatch->delete()){
                        return json_encode(['success'=>true]);
                    }
                }
            }
        }

        return json_encode(['success'=>false]);

    }

    protected function isDocumentValid($str){
        if($str === 'application/excel' || $str === 'application/vnd.ms-excel'
            || $str === 'application/x-excel'|| $str === 'application/x-msexcel'
            || $str === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
            $str === 'application/excel' || $str === 'application/vnd.ms-excel'
            || $str === 'application/x-excel'|| $str === 'application/x-msexcel'
            || $str === 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' ||
            $str === 'application/doc' || $str === 'application/ms-doc'
            || $str === 'application/msword' || $str === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'
            ||$str === 'application/mspowerpoint' || $str === 'application/powerpoint' || $str === 'application/vnd.ms-powerpoint'
            || $str === 'application/x-mspowerpoint' || $str === 'application/vnd.openxmlformats-officedocument.presentationml.presentation'){
            return true;
        }
        return false;

    }


}
