<?php

namespace App\Models\Users;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Teacher extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    use HasFactory;
    use Notifiable;

    protected $table = 'teacher';
    protected $hidden = [
        'password', 'remember_token'
    ];
    protected $fillable = [
        'f_name',
        'm_name',
        'l_name',
        'email',
        'password',
        'isSubscribed',
        'role_id'
    ];
    public function getAuthPassword(){
        return $this->password;
    }
}
