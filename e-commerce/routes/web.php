<?php

use App\Http\Controllers\checkoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\aboutController;

use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);
Route::get('/login', [loginController::class, 'index']);
Route::get('/register', [registerController::class, 'index']);
Route::get('/about', [aboutController::class, 'index']);





