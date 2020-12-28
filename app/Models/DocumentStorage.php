<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocumentStorage extends Model
{
    use HasFactory;
    protected $table = 'document_storage';
    protected $fillable = [
        'storage_path',
        'original_name',
        'original_path',
        'teacher_id'
    ];
}
