<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lapor extends Model
{
    use HasFactory;
    protected $table = 'laporan_bencana';

    protected $fillable = [
        'id',
        'id_pengguna',
        'jenis_bencana',
        'deskripsi',
        'lokasi_lat',
        'lokasi_lng',
        'status'
    ];
}
