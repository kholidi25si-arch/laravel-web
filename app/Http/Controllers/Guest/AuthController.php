<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    private function messages(): array
    {
        return [
            'required'  => ':attribute wajib diisi.',
            'string'    => ':attribute harus berupa teks.',
            'email'     => ':attribute harus berupa alamat email yang valid.',
            'unique'    => ':attribute sudah terdaftar, gunakan yang lain.',
            'confirmed' => 'Konfirmasi :attribute tidak cocok.',
            'max'       => ':attribute maksimal :max karakter.',
            'min'       => ':attribute minimal :min karakter.',
        ];
    }

    private function attributes(): array
    {
        return [
            'username' => 'Username',
            'name'     => 'Nama',
            'email'    => 'Email',
            'password' => 'Password',
        ];
    }

    /**
     * Tampilkan halaman login (GET /auth).
     */
    public function showLogin()
    {
        return view('Guest.auth.login');
    }

    /**
     * Proses login (POST /auth): cek email & password ke tabel users.
     * - berhasil -> redirect ke Dashboard Admin + alert sukses
     * - gagal    -> kembali ke halaman Login + alert error
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], $this->messages(), $this->attributes());

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()
                ->route('admin.dashboard')
                ->with('login_success', 'Login berhasil! Selamat datang, ' . Auth::user()->name . '.');
        }

        // password tidak ikut dikembalikan ke form (sengaja tidak di-flash)
        return redirect()
            ->route('login')
            ->withInput($request->only('email'))
            ->with('login_error', 'Login gagal! Email atau password salah.');
    }

    /**
     * Tampilkan halaman register (GET /register).
     */
    public function showRegister()
    {
        return view('Guest.auth.register');
    }

    /**
     * Simpan registrasi (POST /register).
     */
    public function register(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|min:3|max:100',
            'email'    => 'required|email|max:100|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ], $this->messages(), $this->attributes());

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);

        return redirect()
            ->route('login')
            ->with('register_success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Logout (POST /logout).
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('logout_success', 'Anda berhasil logout.');
    }
}
