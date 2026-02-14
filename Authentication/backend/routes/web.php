<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});

Route::get('/register',[AuthController::class,'showRegister'])->name('register.form');

Route::post('/register',[AuthController::class,'store'])->name('registerd');

Route::post('/',[AuthController::class,'login'])->name('login');

Route::get('/dashboard',function(){
    return view('dashboard');
})->name('dashboard');