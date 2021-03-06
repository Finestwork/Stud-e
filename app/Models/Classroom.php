<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;
    protected $table = 'classroom';
    protected $casts = [
        'classroom_schedule' => 'array'
    ];
    protected $fillable = [
        'classroom_name',
        'classroom_section',
        'classroom_description',
        'classroom_schedule',
        'class_code',
        'classroom_unique_url'
    ];
}
