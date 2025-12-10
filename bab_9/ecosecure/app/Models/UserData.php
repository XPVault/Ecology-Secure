<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    protected $table = 'tb_user';

    protected $fillable = [
        'username',
        'email',
        'password',
    ];
}
