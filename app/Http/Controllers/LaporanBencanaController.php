<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanBencana;

class LaporanBencanaController extends Controller
{
    /**
     * Menampilkan daftar laporan bencana.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laporan_bencana = LaporanBencana::all(); // Use $laporan_bencana instead of $laporanBencana
        return view('laporan_bencana.index', compact('laporan_bencana'));
    }

    /**
     * Menampilkan formulir untuk mengedit laporan bencana tertentu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $laporan = LaporanBencana::find($id);
        return view('laporan_bencana.edit', compact('laporan'));
    }

    /**
     * Menyimpan perubahan pada laporan bencana tertentu ke dalam basis data.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_bencana' => 'required',
            'deskripsi' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'status' => 'required',
        ]);

        $laporan = LaporanBencana::find($id);
        $laporan->jenis_bencana = $request->jenis_bencana;
        $laporan->deskripsi = $request->deskripsi;
        $laporan->latitude = $request->latitude;
        $laporan->longitude = $request->longitude;
        $laporan->status = $request->status;
        $laporan->save();

        return redirect()->route('laporan-bencana.index')->with('success', 'Data laporan bencana berhasil diperbarui.');
    }

    /**
     * Menghapus laporan bencana tertentu dari basis data.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = LaporanBencana::find($id);
        $laporan->delete();

        return redirect()->route('laporan-bencana.index')->with('success', 'Data laporan bencana berhasil dihapus.');
    }
}
