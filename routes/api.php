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

use App\Http\Controllers\ParticipantController;
Route::resource('participants', ParticipantController::class);

use App\Http\Controllers\ProductController;
Route::resource('products', ProductController::class);

use App\Http\Controllers\ProductPictureController;
Route::resource('product_pictures', ProductPictureController::class);

use App\Http\Controllers\ParticipantPictureController;
Route::resource('participant_pictures', ParticipantPictureController::class);

use App\Http\Controllers\OrderController;
Route::resource('orders', OrderController::class);

use App\Http\Controllers\OrderDetailController;
Route::resource('order_details', OrderDetailController::class);

use App\Http\Controllers\CategoryController;
Route::resource('categories', CategoryController::class);