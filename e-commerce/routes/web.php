<?php

use Illuminate\Support\Facades\Route;
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
use App\Http\Controllers\ProductController;

use App\Http\Controllers\createAccountController;
use App\Http\Controllers\adminProductController;
use App\Http\Controllers\adminController;
use App\Http\Controllers\productdetailController;

//Route umum
Route::get('/', [loginController::class, 'index'])->name('indexLogin');
Route::get('/login', [loginController::class, 'index'])->name('indexLogin');
Route::post('/login', [loginController::class, 'login'])->name('login');
Route::get('/logout', [loginController::class, 'logout'])->name('logout');

Route::get('/createAccount', [createAccountController::class, 'index']);
Route::post('/createAccount', [createAccountController::class, 'createAccount']);

Route::get('/home', [ProductController::class, 'index'])->name('products.index');

// jadi localhost/user/home buat mastiin harus login dlu sebelum masuk website
Route::group(['prefix' => 'user', 'middleware' => ['auth'], 'as' => 'user.'], function(){
    Route::get('/home', [homeController::class, 'index'])->name('home');
    Route::get('/profile', [profileController::class, 'index'])->name('profile');
    Route::get('/updateProfile', [updateProfileController::class, 'index'])->name('updateProfile');
    Route::put('/updateProfile', [updateProfileController::class, 'update'])->name('updateProfile');
    Route::get('/changePassword', [changePasswordController::class, 'index'])->name('changePassword');
    Route::get('/product/{id}', [productdetailController::class, 'index'])->name('indexProduct');
    Route::post('/changePassword', [changePasswordController::class, 'changePassword']);
    Route::get('/changePin', [changePinController::class, 'index'])->name('index.changePin');
    Route::post('/changePin', [changePinController::class, 'changePin'])->name('changePin');
    Route::get('/cart', [cartController::class, 'index'])->name('cart');
    Route::post('/cart/add/{product}', [cartController::class, 'addToCart'])->name('cart.add');
    Route::put('/cart/update/{item}', [cartController::class, 'updateCart'])->name('cart.update');
    Route::delete('/cart/remove/{item}', [cartController::class, 'removeFromCart'])->name('cart.remove');
    Route::get('/checkout', [checkoutController::class, 'index'])->name('checkout');
    Route::get('/topup', [topupController::class, 'index'])->name('topup.index');
    Route::post('/topup', [topupController::class, 'topUp'])->name('topup');
    Route::post('/checkout', [checkoutController::class, 'processCheckout'])->name('checkout.process');
    Route::get('/purchaseHistory', [purchasehistoryController::class, 'index'])->name('purchaseHistory');
    Route::get('/about', [aboutController::class, 'index'])->name('about');
});

// Route admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    
    // route untuk post product baru
    Route::get('productCreate', [adminProductController::class, 'create'])->name('products.create');
    Route::post('admin/products', [adminProductController::class, 'store'])->name('products.store');

    // halaman depan admin
    Route::get('dashboard', [adminController::class, 'index'])->name('dashboard');

    // nampilin daftar produk versi admin
    Route::get('dashboard/product', [adminController::class, 'indexProduct'])->name('dashboard.product');

    // nampilin semua transaksi oleh berbagai user
    Route::get('purchase/transaction', [adminController::class, 'indexTransaction'])->name('purchase.transaction');

    Route::get('productEdit/{id}', [adminProductController::class, 'edit'])->name('products.edit');
    Route::put('productEdit/{id}', [adminProductController::class, 'update'])->name('products.update');

    Route::delete('productDelete/{id}', [adminProductController::class, 'delete'])->name('products.delete');
});
