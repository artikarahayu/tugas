<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\MemoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('memo', memoController::class);

Route::middleware('guest')->group(function() {
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/login', [LoginController::class, 'store']);
});
Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');
