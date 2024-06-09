<?php

use App\Http\Controllers\checkoutController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [homeController::class, 'index']);

Route::get('/login', [loginController::class, 'index'])->name('login');
Route::get('/register', [registerController::class, 'index']);
Route::get('/checkout', [checkoutController::class, 'index']);

// Route::get('/home', function () {
//     return view('home');
// });

// Route::get('/about', function () {
//    return view('about');
// });


// Route::get('/mahasiswa', function () {
//     echo 'Mahasiswa';
// });


// Route::get('/user/{id}', function ($id) {
//     echo "Hello" . $id;
// });

// Route::get('/users/{name?}', function ($name = 'Peter') {
//     return ('User name: ' . $name);
// });


