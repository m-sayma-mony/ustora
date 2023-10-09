<?php

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Route;

// Frontend
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    // Backend
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Category
    Route::get('/category.create', [CategoryController::class, 'create'])->name('category.create');
    Route::post('/category.store', [CategoryController::class, 'store'])->name('category.store');
    Route::get('/category.index', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category.destroy/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
    Route::get('/category.edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category.update/{id}', [CategoryController::class, 'update'])->name('category.update');

    // Product
    Route::get('/product.create', [ProductController::class, 'create'])->name('product.create');
    Route::post('/product.store', [ProductController::class, 'store'])->name('product.store');
    Route::get('/product.index', [ProductController::class, 'index'])->name('product.index');
    Route::get('/product.destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    Route::get('/product.edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
    Route::post('/product.update/{id}', [ProductController::class, 'update'])->name('product.update');
});
