<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RequestStudent extends Model
{
    use HasFactory;
    protected $table = 'request_student';
    protected $fillable = [
        'student_id',
        'classroom_id'
    ];
}
