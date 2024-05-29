<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\GoogleController;

Route::match(['get','post'], '/authPage', [UserController::class, 'authPage']);
Route::get('/regPage', [UserController::class, 'regPage']);
Route::get('/form', [UserController::class, 'addUserForm']);
Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::post('/ordersPage', [OrderController::class, 'openOrderPage']);
Route::get('/form', [UserController::class, 'addUserForm']);
Route::get('/newUser', [UserController::class, 'addUser']);
Route::get('/getUsers', [UserController::class, 'getUsers']);
Route::get('/searchUser', [UserController::class, 'searchUser']);








Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function(){
    return view('welcome');
});
Route::get('auth/google', [GoogleController::class, 'googlepage']);
Route::get('auth/google/callback', [GoogleController::class, 'googlecallback']);