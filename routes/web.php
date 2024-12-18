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
    $data = array();
    $data['title'] = "Register";
    return view('register', $data);
});
Route::post('actionregister', [App\Http\Controllers\RegisterController::class, 'actionregister'])->name('actionregister');
Route::get('dashboard', function () {
    $data = array();
    $data['title'] = "Dasboard";
    return view('dashboard', $data);
})->middleware('auth')->name('dashboard');
Route::get('aboutus', function () {
    $data = array();
    $data['title'] = "About Us";
    return view('aboutus', $data);
})->middleware('auth');
Route::resource('/pegawai', App\Http\Controllers\PegawaiController::class)->middleware('auth');
Route::get('/carirole', [App\Http\Controllers\PegawaiController::class, 'carirole'])->middleware('auth');
Route::get('/caridepartment', [App\Http\Controllers\PegawaiController::class, 'caridepartment'])->middleware('auth');
