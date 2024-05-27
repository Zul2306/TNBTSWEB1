<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pengguna;

class PenggunaController extends Controller
{
    public function read( )
    {
        $pengguna = Pengguna::all();
        return view('pengguna.index', compact('pengguna'));
    }

    // public function create()
    // {
    //     return view('pengguna.create');
    // }

    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:pengguna',
    //         'password' => 'required|string|min:8',
    //     ]);

    //     $pengguna = new Pengguna();
    //     $pengguna->nama = $validatedData['nama'];
    //     $pengguna->email = $validatedData['email'];
    //     $pengguna->password = bcrypt($validatedData['password']);
    //     $pengguna->save();

    //     return redirect()->route('pengguna.index')->with('success', 'Pengguna created successfully.');
    // }

    // public function show($id)
    // {
    //     $pengguna = Pengguna::find($id);
    //     return view('pengguna.show', compact('pengguna'));
    // }

    // public function edit($id)
    // {
    //     $pengguna = Pengguna::find($id);
    //     return view('pengguna.edit', compact('pengguna'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'nama' => 'required|string|max:255',
    //         'email' => 'required|string|email|max:255|unique:pengguna,email,' . $id,
    //         'password' => 'nullable|string|min:8',
    //     ]);

    //     $pengguna = Pengguna::find($id);
    //     $pengguna->nama = $validatedData['nama'];
    //     $pengguna->email = $validatedData['email'];
    //     if ($request->filled('password')) {
    //         $pengguna->password = bcrypt($validatedData['password']);
    //     }
    //     $pengguna->save();

    //     return redirect()->route('pengguna.show', $pengguna->id)->with('success', 'Pengguna updated successfully.');
    // }
    public function edit($id)
    {
        $pengguna = Pengguna::find($id);
        return view('Admin', compact(['admin']));
    }

    public function destroy($id)
    {
        $pengguna = Pengguna::findOrFail($id);
        $pengguna->delete();

        return redirect('/pengguna')->with('success', 'Pengguna berhasil dihapus.');
    }
}
