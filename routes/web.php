<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Guest\AuthController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PasienHewanController;
use App\Http\Controllers\Admin\LayananKlinikController;
use App\Http\Controllers\Admin\DokterController;
use App\Http\Controllers\Admin\JadwalPraktikController;
use App\Http\Controllers\Admin\TestimoniController;
use App\Http\Controllers\Admin\UserController;

//Guest (Home, Login, Register)
Route::get('/', [GuestController::class, 'index'])->name('home');
Route::get('/guest', [GuestController::class, 'index']);

Route::get('/auth', [AuthController::class, 'showLogin'])->name('login');
Route::post('/auth', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.store');

Route::post('/logout', [AuthController::class, 'logout'])
    ->middleware('checkislogin')
    ->name('logout');

//Admin (wajib login -> middleware checkislogin, lalu dibatasi per role -> checkrole)
Route::middleware(['checkislogin'])->group(function () {

    // Dashboard: semua user yang sudah login
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

    Route::prefix('admin')->group(function () {

        // Hanya Super Admin: kelola data user
        Route::middleware(['checkrole:Super Admin'])->group(function () {
            Route::resource('user', UserController::class);
        });

        // Super Admin dan mitra: data klinik
        Route::middleware(['checkrole:Super Admin,mitra'])->group(function () {
            Route::resource('pasien-hewan', PasienHewanController::class);
            Route::resource('layanan-klinik', LayananKlinikController::class);
            Route::resource('dokter', DokterController::class);
            Route::resource('jadwal-praktik', JadwalPraktikController::class);
            Route::resource('testimoni', TestimoniController::class);
        });
    });
});

Route::post('question/store', [QuestionController::class, 'store'])
    ->name('question.store');

Route::get('/home', function () {
    return view('home');
});
