<?php

use App\Http\Controllers\MainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/main/customers/{id}/tours', [MainController::class, 'getTourOfCustomer']);
Route::get('/main/tours/{id}/customers', [MainController::class, 'getCustomerOfTours']);
