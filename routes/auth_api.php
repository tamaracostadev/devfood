<?php


use App\Http\Controllers\Api\OrderController;

Route::group(['prefix' => 'v1'], function () {
	Route::get('/my-orders', [OrderController::class, 'myOrders'])->name('my-orders');
	Route::patch('/my-orders/{identify}', [OrderController::class, 'update'])->name('update');
});
