<?php

use App\Http\Controllers\TourController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/tours', [TourController::class, 'index']);
Route::get('/tours/{id}', [TourController::class, 'detail']);
Route::post('/tours', [TourController::class, 'store']);
Route::delete('/tours/{id}', [TourController::class, 'destroy']);
