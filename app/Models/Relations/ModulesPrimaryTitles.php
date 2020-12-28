<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModulesPrimaryTitles extends Model
{
    use HasFactory;
    protected $table = 'module_primary_titles';
    protected $fillable = [
        'module_primary_title',
        'classroom_id'
    ];
}
