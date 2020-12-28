<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modules extends Model
{
    use HasFactory;
    protected $table = 'modules';
    protected $fillable = [
        'module_secondary_title',
        'module_description',
        'module_docs',
        'module_videos',
        'module_sounds',
        'primary_title_id'
        ];
}
