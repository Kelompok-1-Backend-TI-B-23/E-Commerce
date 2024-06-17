<?php

use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\aboutController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\updateProfileController;
use App\Http\Controllers\changePinController;
use App\Http\Controllers\changePasswordController;
use App\Http\Controllers\cartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\topupController;
use App\Http\Controllers\purchasehistoryController;

use App\Http\Controllers\createAccountController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [homeController::class, 'index']);
Route::get('/login', [loginController::class, 'index']);
Route::get('/about', [aboutController::class, 'index']);
Route::get('/profile', [profileController::class, 'index']);
Route::get('/updateProfile', [updateProfileController::class, 'index']);
Route::get('/changePin', [changePinController::class, 'index']);
Route::get('/cart', [cartController::class, 'index']);
Route::get('/checkout', [checkoutController::class, 'index']);
Route::get('/topup', [topupController::class, 'index']);
Route::get('/purchaseHistory', [purchasehistoryController::class, 'index']);

// Create account
Route::get('/createAccount', [createAccountController::class, 'index']);
Route::post('/createAccount', [createAccountController::class, 'createAccount']);
Route::post('/createAccount', [createAccountController::class, 'createAccount']);

// Change Pin
Route::get('/changePin', [changePinController::class, 'index']);
Route::post('/changePin', [changePinController::class, 'changePin']);

// Change Password
Route::get('/changePassword', [changePasswordController::class, 'index']);
Route::post('/changePassword', [changePasswordController::class, 'changePassword']);





