<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::post('actionlogin', [App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout');
Route::get('register', function () {
    return view('register');
});
Route::get('dashboard', function () {
    return view('dashboard');
});