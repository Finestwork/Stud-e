<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    protected $table = 'student';
    protected $guarded = [];
    protected $hidden = [
        'password'
    ];
    protected $fillable = [
        'f_name',
        'm_name',
        'l_name',
        'email',
        'password',
        'role_id'
    ];

    public function getAuthPassword(){
        return $this->password;
    }
}
