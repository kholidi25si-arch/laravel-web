<?php

use App\Http\Controllers\QuestionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::post('question/store', [QuestionController::class, 'store'])
		->name('question.store');

Route::get('/home', function () {
    return view('home');
});
