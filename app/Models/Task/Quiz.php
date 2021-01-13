<?php

namespace App\Models\Task;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = 'quiz';
    protected $casts = [
        'content'=>'array',
        'classID'=>'array',
        'timer'=>'array',
    ];
    protected $fillable = [
        'content',
        'status',
        'totalItems',
        'maxPoints',
        'title',
        'submodule',
        'timer',
        'deadline',
        'submission',
        'cheatingAttempt',
        'instructions',
        'hashedUrl',
        'classID'
    ];

}
