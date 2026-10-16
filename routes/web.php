<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;

use App\Http\Controllers\Guest\GuestController;
use App\Http\Controllers\Admin\PasienHewanController;
use App\Http\Controllers\Admin\LayananKlinikController;
use App\Http\Controllers\Admin\DokterController;



Route::get('/', function () {
    return view('welcome');
});

//Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');

Route::prefix('admin')->group(function () {
    Route::resource('pasien-hewan', PasienHewanController::class);
    Route::resource('layanan-klinik', LayananKlinikController::class);
    Route::resource('dokter', DokterController::class);
});

//Guest
Route::get('/guest',[GuestController::class,'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home', function () {
    return view('home');
});


