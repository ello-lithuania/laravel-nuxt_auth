<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::delete('/logout', [AuthController::class,'destroy']);
    Route::get('/user', [AuthController::class,'index']);
});

Route::post('/signup', [AuthController::class,'store']);
Route::post('/login', [AuthController::class,'login']);

