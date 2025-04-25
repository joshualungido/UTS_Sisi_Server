<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('items', ItemController::class)->only(['index', 'create', 'store']);
Route::resource('categories', CategoryController::class)->only(['index', 'create', 'store']);
Route::get('categories/{id}/report', [CategoryController::class, 'report'])->name('categories.report');
Route::resource('suppliers', SupplierController::class)->only(['index', 'create', 'store']);