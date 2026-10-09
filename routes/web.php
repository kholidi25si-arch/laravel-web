<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Guest\GuestController;

Route::get('/', function () {
    return view('welcome');
});


//Admin
Route::get('/admin', [AdminController::class, 'index']);

//Guest
Route::get('/guest',[GuestController::class,'index']);

Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home', function () {
    return view('home');
});
