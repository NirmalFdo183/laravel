<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/login', [AuthController::class, 'showLogin']);
Route::post('/login', [AuthController::class, 'loginAttempt'])->name('login');
Route::get('/user/register', [AuthController::class, 'showRegister']);
Route::post('/user/register', [AuthController::class, 'createUser'])->name('register');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {

    Route::middleware('role:user')->group(function () {
        Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
        Route::put('/user/dashboard/edit',[UserController::class,'editUser'])->name('editUser');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
        Route::post('/admin/dashboard/food',[FoodController::class,'createFoodItem'])->name('createFoodItem');
        Route::delete('/admin/dashboard/food/{id}',[FoodController::class,'deleteFoodItem'])->name('deleteFoodItem');
        Route::put('/admin/dashboard/food/{id}',[FoodController::class,'editFoodItem'])->name('editFoodItem');
        Route::get('/admin/dashboard/food/{food}',[FoodController::class,'editFoodItemPage'])->name('editFoodItemPage');
        Route::delete('/admin/dashboard/user/{id}',[UserController::class,'deleteUser'])->name('deleteUser');
    });
});
