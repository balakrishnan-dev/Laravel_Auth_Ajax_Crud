<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/dashboard',[StudentController::class, 'index']);
