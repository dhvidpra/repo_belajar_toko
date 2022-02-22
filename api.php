<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomersController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\DetailOrdersController;

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

Route::get('/Customers', [CustomersController::class, 'show']);
Route::get('/Customers/{id}', [CustomersController::class, 'detail']);
Route::post('/Customers', [CustomersController::class, 'store']);

Route::get('/Product', [ProductController::class, 'show']);
Route::get('/Product/{id}', [ProductController::class, 'detail']);
Route::post('/Product', [ProductController::class, 'store']);

Route::get('/Orders', [OrdersController::class, 'show']);
Route::get('/Orders/{id}', [OrdersController::class, 'detail']);
Route::post('/Orders', [OrdersController::class, 'store']);

Route::get('/DetailOrders', [DetailOrdersController::class, 'show']);
Route::get('/DetailOrders/{id}', [OrdersController::class, 'detail']);
Route::post('/DetailOrders', [DetailOrdersController::class, 'store']);