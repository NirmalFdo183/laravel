<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/login',[AuthController::class,'loginForm'])->name('login.form');
Route::get('/register',[AuthController::class,'registerForm'])->name('register.form');

Route::post('/register',[AuthController::class,'register'])->name('register');
Route::post('/login',[AuthController::class,'login'])->name('login');

Route::middleware('auth')->group(function(){
    Route::middleware('role:customer')->group(function(){
        Route::get('/customer/dashboard',[AuthController::class,'customerDashboard'])->name('customer.dashboard');
    });
});




