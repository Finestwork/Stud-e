<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AudioStorage extends Model
{
    use HasFactory;
    protected $table = 'audio_storage';
    protected $fillable = [
        'storage_path',
        'original_name',
        'teacher_id'
    ];
}
