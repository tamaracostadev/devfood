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
use App\Http\Controllers\Api\TenantController;

Route::get('/tenants', [TenantController::class, 'index']);
Route::get('/tenants/{uuid}', [TenantController::class, 'show']);

Route::get('/categories', [CategoryController::class, 'categoriesByTenant']);
Route::get('/categories/{url}', [CategoryController::class, 'show']);
