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

Route::get('/login', [loginController::class, 'index'])->name('indexLogin');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/createAccount', [createAccountController::class, 'index']);
Route::post('/createAccount', [createAccountController::class, 'createAccount']);

Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function(){
    Route::get('/home', [homeController::class, 'index'])->name('home');
    Route::get('/profile', [profileController::class, 'index'])->name('profile');
    Route::get('/updateProfile', [updateProfileController::class, 'index'])->name('updateProfile');
    Route::put('/updateProfile', [updateProfileController::class, 'update'])->name('updateProfile');
    Route::get('/changePassword', [changePasswordController::class, 'index'])->name('changePassword');
    
    Route::post('/changePassword', [changePasswordController::class, 'changePassword']);
    Route::get('/changePin', [changePinController::class, 'index'])->name('index.changePin');
    Route::post('/changePin', [changePinController::class, 'changePin'])->name('changePin');  

    Route::get('/cart', [cartController::class, 'index'])->name('cart');
    Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout');
    Route::get('/topup', [topupController::class, 'index'])->name('topup');
    Route::get('/purchaseHistory', [purchasehistoryController::class, 'index'])->name('purchaseHistory');
    Route::get('/about', [aboutController::class, 'index'])->name('about');
});