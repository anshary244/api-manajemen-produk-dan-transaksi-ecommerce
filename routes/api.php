<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\TransactionDetailController;
/*
|--------------------------------------------------------------------------
| API RoutesN
|--------------------------------------------------------------------------
| Semua route di sini otomatis punya prefix /api
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:api')->group(function () {

    // PROFILE
    Route::get('/profile',              [AuthController::class, 'profile']);
    Route::post('/logout',              [AuthController::class, 'logout']);

    // PRODUCTS
    Route::get('/products',             [ProductController::class, 'index']);       
    Route::post('/products',            [ProductController::class, 'store']);       
    Route::get('/products/{id}',        [ProductController::class, 'show']);    
    Route::put('/products/{id}',        [ProductController::class, 'update']);  
    Route::delete('/products/{id}',     [ProductController::class, 'destroy']);  

    // TRANSACTIONS
    Route::get('/transactions',         [TransactionController::class, 'index']);
    Route::post('/transactions',        [TransactionController::class, 'store']);
    Route::get('/transactions/{id}',    [TransactionController::class, 'show']);
    Route::put('/transactions/{id}',    [TransactionController::class, 'update']);
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);

    // PAYMENTS
    Route::apiResource('payments', PaymentController::class);
    
    // transaksi details
    Route::get('/transaction-details', [TransactionDetailController::class, 'index']);
    Route::post('/transaction-details', [TransactionDetailController::class, 'store']);
    Route::put('/transaction-details/{id}', [TransactionDetailController::class, 'update']);
    Route::delete('/transaction-details/{id}', [TransactionDetailController::class, 'destroy']);
   

});
