<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::resource('products', ProductController::class)->except(['create', 'edit']);
Route::get('fetch', [ProductController::class, 'fetch'])->name('fetch');