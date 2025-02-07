<?php

use App\Http\Controllers\admin2Controller;
use App\Http\Controllers\adminController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'store'])->name('register.store');

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'store'])->name('login.store');

Route::post('/logout', [logoutController::class, 'logout'])->name('logout');
// Dashboard user

Route::get('/user', [userController::class, 'index'])->name('user');
Route::post('/user', [userController::class, 'edit'])->name('user.edit');

// dasnboard admin

Route::get('/admin', [admin2Controller::class,'index']);
Route::put('/admin', [Admin2Controller::class, 'editAdmin'])->name('admin.edit');
Route::post('/admin', [admin2Controller::class, 'storeUser' ])->name('admin.store'); 
Route::delete('/admin', [admin2Controller::class, 'delete' ])->name('admin.delete'); 
