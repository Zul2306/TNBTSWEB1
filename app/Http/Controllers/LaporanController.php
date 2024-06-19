<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        $laporans = Laporan::where('latitude', '!=', 0)
                            ->where('longitude', '!=', 0)
                            ->where('status', 'dalam_proses')
                            ->get();

        $locations = [];
        foreach ($laporans as $laporan) {
            $photo = base64_encode($laporan->photo);

            $locations[] = [
                'id' => $laporan->id,
                'jenis_bencana' => $laporan->jenis_bencana,
                'deskripsi' => $laporan->deskripsi,
                'lintang' => $laporan->latitude,
                'bujur' => $laporan->longitude,
                'photo' => $photo,
            ];
        }

        return response()->json($locations);
    }
}
