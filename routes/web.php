<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;

Route::match(['get','post'], '/authPage', [UserController::class, 'authPage']);
Route::get('/regPage', [UserController::class, 'regPage']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/ordersPage', [OrderController::class, 'openOrderPage']);
