<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;


Route::get('/', fucntion () {
    return view('home.home');
});

Route::get('product', [ProductController::class, 'index'])->name('product.index');
Route::get('product/create', [ProductController::class, 'create'])->name('product.create');
Route::post('product/store', [ProductController::class, 'store'])->name('product.store');
Route::get('product/edit/{id}', [ProductController::class, 'edit'])->name('product.edit');
Route::get('product/show/{id}', [ProductController::class, 'show'])->name('product.show');
Route::put('product/update/{id}', [ProductController::class, 'update'])->name('product.update');
Route::delete('product/destroy/{id}', [ProductController::class, 'destroy'])->name('product.destroy');