<?php

namespace App\Http\Controllers;

use App\Models\AudioStorage;
use App\Models\Classroom;
use App\Models\DocumentStorage;
use App\Models\ImageStorage;
use App\Models\PdfStorage;
use App\Models\VideoStorage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    public function downloadAFile($classUrl, $fileType, $fileID) {
        $isClassActive = Classroom::where('classroom_unique_url', $classUrl)->get()->first();
        if($isClassActive){
            if($fileType === 'img'){
                $originalName = ImageStorage::select('original_name')->where('hashed_name', $fileID)->get()->first();
                return Storage::download('public/img/'.$fileID, $originalName->original_name);
            }else if($fileType === 'audio'){
                $originalName = AudioStorage::select('original_name')->where('hashed_name', $fileID)->get()->first();
                return Storage::download('public/audio/'.$fileID, $originalName->original_name);
            }else if($fileType === 'video'){
                $originalName = VideoStorage::select('original_name')->where('hashed_name', $fileID)->get()->first();
                return Storage::download('public/video/'.$fileID, $originalName->original_name);
            }else if($fileType === 'pdf'){
                $originalName = PdfStorage::select('original_name')->where('hashed_name', $fileID)->get()->first();
                return Storage::download('public/pdf/'.$fileID, $originalName->original_name);
            }else if($fileType === 'video'){
                $originalName = DocumentStorage::select('original_name')->where('hashed_name', $fileID)->get()->first();
                return Storage::download('public/document/'.$fileID, $originalName->original_name);
            }
        }
        return redirect('/');
    }
}
