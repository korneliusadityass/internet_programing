<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $data = array();
    $data['title'] = "Login";
    return view('login', $data);
})->name('login');
Route::post('actionlogin', [App\Http\Controllers\LoginController::class, 'actionlogin'])->name('actionlogin');
Route::get('actionlogout', [App\Http\Controllers\LoginController::class, 'actionlogout'])->name('actionlogout');
Route::get('register', function () {
    return view('register');
});
Route::post('actionregister', [App\Http\Controllers\RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard');
Route::get('aboutus', function () {
    return view('aboutus');
})->name('aboutus');
