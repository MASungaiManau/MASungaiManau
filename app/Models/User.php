<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    protected $fillable = [
        'nama',
        'email',
        'username',
        'no_telp',
        'foto',
        'password',
        'level'
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
