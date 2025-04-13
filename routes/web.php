<?php

use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminOnly;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [EventController::class, 'tampilHome'])->name('home');

Route::get('/registrasi', [AuthController::class, 'tampilRegistrasi'])->name('registrasi');
Route::post('/registrasi/submit', [AuthController::class, 'submitRegistrasi'])->name('registrasi.submit');

Route::get('/login', [AuthController::class, 'tampilLogin'])->name('login');
Route::post('/login/submit', [AuthController::class, 'submitLogin'])->name('login.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/submission', [EventController::class, 'tampilSubmission'])->name('submission');
    Route::post('/submission/submit', [EventController::class, 'store'])->name('submission.submit');
});

Route::post('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware([AdminOnly::class])->group(function () {
    Route::get('/admin/dashboard', [AdminEventController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/tambah', [AdminEventController::class, 'tampilTambah'])->name('admin.tambah');
    Route::post('/admin/event/store', [AdminEventController::class, 'store'])->name('admin.event.store');
    Route::delete('/admin/event/delete/{id}', [AdminEventController::class, 'destroy'])->name('admin.event.delete');
    Route::get('/admin/event/edit/{id}', [AdminEventController::class, 'edit'])->name('admin.event.edit');
    Route::put('/admin/event/update/{id}', [AdminEventController::class, 'update'])->name('admin.event.update');
});