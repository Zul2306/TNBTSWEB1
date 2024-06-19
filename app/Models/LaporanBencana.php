<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanBencana extends Model
{
    use HasFactory;

    protected $table = 'laporan_bencana'; // Nama tabel di database

    protected $fillable = [
        'jenis_bencana',
        'photo',
        'deskripsi',
        'status',
        'latitude',
        'longitude',
    ];
}
