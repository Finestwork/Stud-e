<?php

namespace App\Models\Relations;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApprovedStudent extends Model
{
    use HasFactory;
    protected $table = 'approved_students';
    protected $fillable = [
        'student_id',
        'classroom_id'
    ];
}
