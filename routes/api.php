<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Products
Route::prefix('products')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\ProductController::class, 'index'])->name('products.index');
    Route::get('/{id}', [\App\Http\Controllers\Backend\ProductController::class, 'show'])->name('products.show');
});

// Orders
Route::prefix('orders')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\OrderController::class, 'index'])->name('orders.index');
    Route::get('/{id}', [\App\Http\Controllers\Backend\OrderController::class, 'show'])->name('orders.show');
});

Route::prefix('sliders')->group(function () {

});
