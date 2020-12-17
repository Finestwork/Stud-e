<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherClassroom extends Model
{
    use HasFactory;
    protected $table = 'teacher_classroom';
    protected $fillable = [
        'teacher_id',
        'classroom_id'
    ];
}
