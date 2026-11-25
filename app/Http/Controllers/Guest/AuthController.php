<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Tampilkan halaman login (GET /auth)
    public function showLogin()
    {
        // Halaman login hanya untuk yang belum login
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('Guest.login');
    }

    // Proses login (POST /auth) - cek username & password ke tabel users
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Data tambahan di session (bukan pengganti status login)
            session(['last_login' => now()->timezone('Asia/Jakarta')->format('d M Y, H:i') . ' WIB']);

            return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil. Selamat datang, ' . Auth::user()->name . '!');
        }

        return redirect()->route('login')
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah!');
    }

    // Tampilkan halaman register (GET /register)
    public function showRegister()
    {
        return view('Guest.register');
    }

    // Proses register (POST /register) - validasi lalu simpan ke tabel users
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:50|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'unique'     => ':attribute sudah terdaftar.',
            'required'   => ':attribute wajib diisi.',
            'email'      => ':attribute harus berupa email yang valid.',
            'min'        => ':attribute minimal :min karakter.',
            'confirmed'  => 'Konfirmasi :attribute tidak cocok.',
            'alpha_dash' => ':attribute hanya boleh huruf, angka, strip, dan underscore.',
        ], [
            'name'     => 'Name',
            'username' => 'Username',
            'email'    => 'Email',
            'password' => 'Password',
        ]);

        User::create([
            'name'     => $request->name,
            'username' => $request->username,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'mitra', // user yang mendaftar sendiri otomatis berperan mitra
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }

    // Logout (POST /logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login')->with('success', 'Anda telah logout.');
    }
}
