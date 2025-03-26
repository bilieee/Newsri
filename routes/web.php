<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::get('/submission', [AuthController::class, 'tampilSubmission'])->name('submission');
Route::post('/submission/submit', [AuthController::class, 'submitSubmission'])->name('submission.submit');

Route::get('/home2', [AuthController::class, 'tampilHome2'])->name('home2');
Route::post('/home2/submit', [AuthController::class, 'submitHome2'])->name('home2.submit');

Route::post('logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/home', [EventController::class, 'tampilHome'])->name('home');
Route::get('/dashboard', [EventController::class, 'tampilDashboard'])->name('admin.dashboard');