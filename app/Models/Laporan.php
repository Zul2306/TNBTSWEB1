<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'laporan_bencana'; // Sesuaikan dengan nama tabel di database
    protected $fillable = ['jenis_bencana', 'photo', 'deskripsi', 'latitude', 'longitude', 'status']; // Atur kolom yang dapat diisi
}
