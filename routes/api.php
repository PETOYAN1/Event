<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\UserController;

Route::prefix('v1')->group( function () {

    // Public routes

    Route::post('/register', [UserController::class, 'store']);
    Route::post('/login', [UserController::class, 'login']);
    Route::get('/user', [UserController::class, 'index']);
    
    // Protected routes
    
    Route::middleware('auth:sanctum')->group( function () {        
    Route::prefix('auth')->group( function () {
        Route::post('/logout', [UserController::class, 'logout']);
        Route::get('/profile', [UserController::class, 'profile']);
        });
    });
});
