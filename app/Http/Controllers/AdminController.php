<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function read()
    {
        $admins = Admin::all();
        // dd($admins);
        return view('Admin.index', compact(['admins']));
    }
    public function create()
    {
        return view('Admin.create');
    }

    public function store(Request $request)
    {
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'password.nullable' => 'Password boleh tidak diisi.',
            'password.string' => 'Password harus berupa angka dan huruf.',
            'password.max' => 'Password tidak boleh lebih dari 8 karakter.',
            'password.regex' => 'password harus mengandung 1 angka dan 1 huruf',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'telepon.digits_between' => 'Nomor telepon harus antara 1 dan 12 digit.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                'max:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/',
            ], // Validasi kolom password
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric|digits_between:1,12',
        ], $messages);
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,

        ]);
        return redirect('/Admin');
    }
    public function edit($id)
    {
        $admin = Admin::find($id);
        return view('Admin', compact(['admin']));
    }
    public function update(Request $request, $id)
    {
        $messages = [
            'name.required' => 'Nama wajib diisi.',
            'name.string' => 'Nama harus berupa string.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Email harus berupa alamat email yang valid.',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
            'password.nullable' => 'Password boleh tidak diisi.',
            'password.string' => 'Password harus berupa string.',
            'password.max' => 'Password tidak boleh lebih dari 8 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.string' => 'Alamat harus berupa string.',
            'alamat.max' => 'Alamat tidak boleh lebih dari 255 karakter.',
            'telepon.required' => 'Nomor telepon wajib diisi.',
            'telepon.numeric' => 'Nomor telepon harus berupa angka.',
            'telepon.digits_between' => 'Nomor telepon harus antara 1 dan 12 digit.',
        ];

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'password' => [
                'required',
                'string',
                'max:8',
                'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_])[A-Za-z\d\W_]+$/',
            ],
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|numeric|digits_between:1,12',
        ], $messages);


        $admin = Admin::findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->password = bcrypt($request->password); // Enkripsi password
        $admin->alamat = $request->alamat;
        $admin->telepon = $request->telepon;
        $admin->save();

        return redirect('/Admin')->with('success', 'YEAYYY!!!. DATA BERHASIL DIPERBARUI');
    }
    public function delete(Request $request, $id)
    {
        // Temukan data admin yang akan dihapus
        $admin = Admin::findOrFail($id);

        // Lakukan penghapusan data
        $admin->delete();

        // Redirect ke halaman yang sesuai atau kirimkan respons JSON jika API
        return redirect('/Admin')->with('success', 'Data admin berhasil dihapus');
    }
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('admin')->attempt($credentials)) {
            return redirect()->intended('/admin/dashboard'); // Redirect ke dashboard admin atau halaman lain
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
    public function registeradmin(Request $request)
{
    // Validasi data registrasi
    $this->validator($request->all())->validate();

    // Buat dan simpan data admin baru
    Admin::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
    ]);

    // Logika lain sesuai kebutuhan (misalnya, kirim email verifikasi)

    // Redirect atau response setelah registrasi sukses
    return redirect()->route('login')->with('success', 'Registrasi berhasil!');
}
public function showRegisForm()
{
    return view('auth.admin-register');
}
}
