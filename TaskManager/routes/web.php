<?php

use App\Http\Controllers\AuthController;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login.form');

Route::post('/login',[AuthController::class,'login'])->name('login');


Route::get('/register',function(){
    return view('user.register');
})->name('register.form');

Route::post('/register',[AuthController::class,'store'])->name('register.user');

Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::get('/admin/dashboard',function(){
    return view('admin.dashboard');
})->name('admin.dashboard');

Route::get('/user/dashboard',function(){
    return view('user.dashboard');
})->name('user.dashboard');
