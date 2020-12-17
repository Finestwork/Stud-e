<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlockedStudent extends Model
{
    use HasFactory;
    protected $table = 'blocked_students';
    protected $fillable = [
        'student_id',
        'classroom_id'
    ];
}
