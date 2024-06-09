<?php

use App\Http\Controllers\checkoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\updateProfileController;
use App\Http\Controllers\changePinController;
use App\Http\Controllers\changePasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', [homeController::class, 'index']);
Route::get('/login', [loginController::class, 'index']);
Route::get('/register', [registerController::class, 'index']);
Route::get('/about', [aboutController::class, 'index']);
Route::get('/profile', [profileController::class, 'index']);
Route::get('/updateProfile', [updateProfileController::class, 'index']);
Route::get('/changePassword', [changePasswordController::class, 'index']);
Route::get('/changePin', [changePinController::class, 'index']);


