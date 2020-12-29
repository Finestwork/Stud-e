<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $casts =[
        'document_id' => 'array',
        'video_id' => 'array',
        'audio_id' => 'array',
        'image_id' => 'array',
        'pdf_id' => 'array',
        'external_links' => 'array',
    ];
    protected $fillable = [
        'secondary_title',
        'description',
        'classroom_url',
        'document_id',
        'video_id',
        'audio_id',
        'image_id',
        'pdf_id',
        'external_links',
        ];
}
