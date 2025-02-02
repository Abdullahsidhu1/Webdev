<?php

use App\Http\Controllers\BrandController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('frontend.index');
});

Route::get('/', [HomeController::class, 'home'])->name('brand.index');


Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});


Route::get('/admin/brand/index', [BrandController::class, 'index'])->name('brand.index');
Route::get('/admin/brand/create', [BrandController::class, 'create'])->name('brand.create');
Route::post('/admin/brand/store', [BrandController::class, 'store'])->name('brand.store');
Route::get('brand/{id}/edit', [BrandController::class, 'edit'])->name('brand.edit');
Route::put('brand/{id}', [BrandController::class, 'update'])->name('brand.update');
Route::delete('brand/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');


Route::get('/admin/product/index', [ProductController::class, 'index'])->name('product.index');
Route::get('admin/product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('admin/product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('admin/product/{id}/edit', [ProductController::class, 'edit'])->name('product.edit');
Route::put('admin/product/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('admin/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');

