<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticationController;

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

// BlogPosts
Route::prefix('blog-posts')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\BlogController::class, 'index'])->name('blog.posts.index');
    Route::get('/{id}', [\App\Http\Controllers\Backend\BlogController::class, 'show'])->name('blog.posts.show');
});

// Brands
Route::prefix('brands')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\BrandController::class, 'index'])->name('brands.index');
    Route::get('/{id}', [\App\Http\Controllers\Backend\BrandController::class, 'show'])->name('brands.show');
});


// Categories
Route::prefix('categories')->group(function () {
    Route::get('/', [\App\Http\Controllers\Backend\CategoryController::class, 'index'])->name('category.index');
    Route::get('/{id}', [\App\Http\Controllers\Backend\CategoryController::class, 'show'])->name('category.show');
});

Route::middleware('auth:sanctum')->group(function () {

    Route::prefix('users')->group(function () {

        Route::prefix('reviews')->group(function () {
            Route::get('/', [\App\Http\Controllers\User\ReviewController::class, 'productPublishedReview'])->name('reviews.me');
        });

        Route::get('/profile/me', [AuthenticationController::class, 'myProfile']);

        Route::post('/sign-out', [AuthenticationController::class, 'signOut']);

        Route::post('/tokens/create', [AuthenticationController::class, 'tokensCreate']);
    });
});


Route::post('/login/email', [AuthenticationController::class, 'loginEmail']);
//register new user
Route::post('/create-account', [AuthenticationController::class, 'createAccount']);
//login user
Route::post('/sign-in', [AuthenticationController::class, 'signIn']);




