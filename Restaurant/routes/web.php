<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login',[AuthController::class,'showLogin']);
Route::post('/login',[AuthController::class,'loginAttempt'])->name('login');
Route::get('/user/register',[AuthController::class,'showRegister']);
Route::post('/user/register',[AuthController::class,'createUser'])->name('register');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    Route::get('/user/dashboard',[UserDashboardController::class,'index'])->name('user.dashboard');
    Route::get('/admin/dashboard',[AdminDashboardController::class,'index'])->name('admin.dashboard');
});
