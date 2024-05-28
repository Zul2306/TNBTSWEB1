<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = 'pengguna';

    // Jika tidak menggunakan timestamps, tambahkan ini
    public $timestamps = true;

    // Kolom yang boleh diisi
    protected $fillable = [
        'id', 'nama_pengguna', 'surel', 'kata_sandi', 'peran',
    ];
    protected $hidden ='password';
}
