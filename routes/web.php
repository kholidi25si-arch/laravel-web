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



//Guest (Partial View): Home, Login, Register
Route::get('/', [GuestController::class, 'home'])->name('guest.home');

Route::get('/auth', [AuthController::class, 'login'])->name('auth.login');
Route::post('/auth', [AuthController::class, 'authenticate'])->name('auth.authenticate');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'storeRegister'])->name('register.store');

//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('pasien-hewan', PasienHewanController::class);
    Route::resource('layanan-klinik', LayananKlinikController::class);
    Route::resource('dokter', DokterController::class);
    Route::resource('user', UserController::class);
});

//GuestS
Route::get('/guest',[GuestController::class,'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home', function () {
    return view('home');
});


