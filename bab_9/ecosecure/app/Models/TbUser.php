<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TbUser extends Model
{
    protected $table = 'tb_user';  
    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'email', 'password'
    ];

    public $timestamps = false; // jika tabel kamu tidak punya created_at & updated_at
}
