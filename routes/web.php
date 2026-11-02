<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Guest\AuthController;
use App\Http\Controllers\Admin\PasienHewanController;
use App\Http\Controllers\Admin\LayananKlinikController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\UserController;



//Guest (Home, Login, Register)
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/guest', [GuestController::class, 'index']);

Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Admin (wajib login)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {
        Route::resource('pasien-hewan', PasienHewanController::class);
        Route::resource('layanan-klinik', LayananKlinikController::class);
        Route::resource('dokter', DokterController::class);
        Route::resource('user', UserController::class);
    });
});

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home', function () {
    return view('home');
});
