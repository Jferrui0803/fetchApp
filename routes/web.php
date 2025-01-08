<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ProductController::class, 'main']);
Route::resource('product', ProductController::class)->except(['create', 'edit']);
Route::get('fetch', [ProductController::class, 'fetch'])->name('fetch');