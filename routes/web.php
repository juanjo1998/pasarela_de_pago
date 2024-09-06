<?php

use App\Http\Controllers\Article\ArticleController;
use App\Http\Controllers\Billing\BillingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Product\ProductController;
use App\Livewire\Subscription\Subscription;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');

// subscription

Route::get('/subscription', Subscription::class)->middleware('auth')->name('subscription');

// billing
Route::get('billing', [BillingController::class, 'index'])->middleware('auth')->name('billing');

// products
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/articles', [ArticleController::class, 'index'])->name('articles.index');
