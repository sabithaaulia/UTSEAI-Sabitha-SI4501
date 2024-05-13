<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/orders', [OrderController::class, 'index']);
Route::post('/orders', [OrderController::class, 'store']);
Route::get('/orders/{id}', [OrderController::class, 'detail']);
Route::get('/orders/customers/{id}', [OrderController::class, 'customer']);
Route::get('/orders/tours/{id}', [OrderController::class, 'tour']);
Route::delete('/orders/{id}', [OrderController::class, 'destroy']);