<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\HocPhanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LopHocController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('hocphan', HocPhanController::class);

// Guest (chưa login)
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

// Auth
Route::middleware('auth')->group(function () {
    Route::resource('students', StudentController::class);
    Route::resource('lophoc', LopHocController::class);

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});