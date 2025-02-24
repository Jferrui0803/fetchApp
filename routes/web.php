<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [CarController::class, 'main']);
Route::resource('cars', CarController::class)->except(['create', 'edit']);

Route::post('login', [UserController::class, 'login'])->name('login');
Route::post('logout', [UserController::class, 'logout'])->name('logout');
Route::post('register', [UserController::class, 'register'])->name('register');