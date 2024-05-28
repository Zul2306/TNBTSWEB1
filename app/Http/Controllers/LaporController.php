<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lapor;

class LaporController extends Controller
{
    public function read() {
        $laporan_bencana = Lapor::all();
        return view('laporan.index', compact(['laporan_bencana']));
    }
}
