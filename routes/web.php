<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

// products

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
