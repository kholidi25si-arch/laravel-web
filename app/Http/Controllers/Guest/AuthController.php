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
    public function login()
    {
        return view('Guest.login');
    }

    // Proses form login (POST /auth) - cek email & password ke tabel users
    public function authenticate(Request $request)
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

            return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil. Selamat datang, ' . Auth::user()->name . '!');
        }

        return redirect()->route('auth.login')
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah!');
    }

    // Logout (POST /logout)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('auth.login')->with('success', 'Anda telah logout.');
    }

    // Tampilkan halaman register (GET /register)
    public function register()
    {
        return view('Guest.register');
    }

    // Proses form register (POST /register) - validasi lalu simpan ke tabel users
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'username' => 'required|alpha_dash|max:50|unique:users,username',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], [
            'unique'    => ':attribute sudah terdaftar.',
            'required'  => ':attribute wajib diisi.',
            'email'     => ':attribute harus berupa email yang valid.',
            'min'       => ':attribute minimal :min karakter.',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
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
        ]);

        return redirect()->route('auth.login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
