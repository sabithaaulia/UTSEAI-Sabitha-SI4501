<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/customers', [CustomerController::class, 'index']);
Route::get('/customers/{id}', [CustomerController::class, 'detail']);
Route::post('/customers', [CustomerController::class, 'store']);
Route::delete('/customers/{id}', [CustomerController::class, 'destroy']);
