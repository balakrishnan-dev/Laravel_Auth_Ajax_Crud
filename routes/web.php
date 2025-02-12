<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/',[AuthController::class,'index']);
Route::post('/login',[AuthController::class,'login']);
Route::get('/register',[AuthController::class,'showRegisterForm']);
Route::post('/register',[AuthController::class,'register']);
Route::get('/dashboard',[AuthController::class,'dashboard'])->name('dashboard');
Route::post('/logout',[AuthController::class,'logout']);