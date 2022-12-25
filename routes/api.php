<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\TableController;
use App\Http\Controllers\Api\TenantController;

Route::prefix('v1')->name('api.v1.')->group(function () {
	Route::prefix('tenants')->name('tenants.')->group(function () {
		Route::get('/', [TenantController::class, 'index'])->name('index');
		Route::get('/{uuid}', [TenantController::class, 'show'])->name('show');
	});

	Route::prefix('categories')->name('categories.')->group(function () {
		Route::get('/', [CategoryController::class, 'categoriesByTenant'])->name('index');
		Route::get('/{url}', [CategoryController::class, 'show'])->name('show');
	});

	Route::prefix('products')->name('products.')->group(function () {
		Route::get('/', [ProductController::class, 'productsByTenant'])->name('index');
		Route::get('/{flag}', [ProductController::class, 'show'])->name('show');
	});

	Route::prefix('tables')->name('tables.')->group(function () {
		Route::get('/', [TableController::class, 'tablesByTenant'])->name('index');
		Route::get('/{identify}', [TableController::class, 'show'])->name('show');
	});
});
