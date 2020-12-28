<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PdfStorage extends Model
{
    use HasFactory;
    protected $table = 'pdf_storage';
    protected $fillable = [
        'storage_path',
        'original_name',
        'original_path',
        'teacher_id'
    ];
}
