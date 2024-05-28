<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    protected $fillable = [
        'id',
        'name',
        'email',
        'password',
        'alamat',
        'telepon',
    ];
    // use Notifiable;
    use Notifiable;

    protected $table = 'admins';
    protected $hidden = [
        'password', 'remember_token',
    ];
}
