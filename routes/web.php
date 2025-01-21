<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', [ProductController::class, 'main']);
Route::get('product/messi/22', [ProductController::class, 'index']);
Route::resource('product', ProductController::class)->except(['create', 'edit']);
//Route::get('fetch', [ProductController::class, 'fetch'])->name('fetch');
Route::get('index1', [ProductController::class, 'index1']);

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
