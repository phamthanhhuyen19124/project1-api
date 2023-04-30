<?php

use App\Http\Controllers\CategoryController;
use \App\Http\Controllers\OrderController;
use \App\Http\Controllers\BrandController;
use \App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//Route::get('/categories', CategoryController::class . '@index');
//Route::post('/categories', CategoryController::class . '@store');
//Route::get('/categories/{id}', CategoryController::class . '@show');
//Route::put('/categories/{id}', CategoryController::class . '@update');
//Route::delete('/categories/{id}', CategoryController::class . '@delete');
Route::resource('/categories', CategoryController::class);
Route::resource('/order', OrderController::class);
Route::resource('/brand', BrandController::class);
Route::resource('/product', Controller::class);
