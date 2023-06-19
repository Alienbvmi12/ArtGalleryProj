<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        return view('homepage');
    } else {
        return view('landing');
    }
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'loginView'])->name('login');
    Route::get('/register', [RegisterController::class, 'registerView']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('login_with_google');
    Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);
    Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('login_with_facebook');
    Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});
