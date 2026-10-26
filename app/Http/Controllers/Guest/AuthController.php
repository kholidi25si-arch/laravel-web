<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    // Tampilkan halaman login (GET /auth)
    public function login()
    {
        return view('Guest.login');
    }

    // Proses form login (POST /auth)
    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);

        // Logika sederhana: login berhasil jika username dan password sama
        if ($request->username === $request->password) {
            return redirect()->route('admin.dashboard')
                ->with('success', 'Login berhasil. Selamat datang, ' . $request->username . '!');
        }

        // Jika salah, kembali ke halaman login dengan alert
        return redirect()->route('auth.login')
            ->withInput($request->only('username'))
            ->with('error', 'Username atau password salah!');
    }

    // Tampilkan halaman register (GET /register)
    public function register()
    {
        return view('Guest.register');
    }

    // Proses form register (POST /register) - validasi saja, belum disimpan ke database
    public function storeRegister(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email',
            'password' => 'required|min:3|confirmed',
        ], [
            'required'  => ':attribute wajib diisi.',
            'email'     => ':attribute harus berupa email yang valid.',
            'min'       => ':attribute minimal :min karakter.',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
        ], [
            'name'     => 'Name',
            'email'    => 'Email',
            'password' => 'Password',
        ]);

        return redirect()->route('auth.login')
            ->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
