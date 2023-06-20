<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    if (Auth::check() && isset(auth()->user()->email_verified_at)) {
        return view('homepage');
    } 
    elseif(Auth::check() && !isset(auth()->user()->email_verified_at)){
        return redirect(route('verification.notice'));
    }
    else {
        return view('landing');
    }
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'loginView'])->name('login');
    Route::get('/register', [RegisterController::class, 'registerView']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);

    //login with google

    Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('login_with_google');
    Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

    //login with facebook

    Route::get('auth/facebook', [LoginController::class, 'redirectToFacebook'])->name('login_with_facebook');

    //Lupa password

    Route::get('/forgot-password', [ResetPasswordController::class, 'forgot_password_view'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'send_reset_token'])->name('password.email');

    //Reset Password

    Route::get('/reset-password', [ResetPasswordController::class, 'reset_password_view'])->name('password.reset');
    Route::post('/reset-password', [ResetPasswordController::class, 'send_reset_password'])->name('password.update');
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout']);
});

//Konfirmasi email

Route::get('/email/verify', function () {
    return view('register.verify-email', ['title' => 'Verify email']);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('auth/facebook/callback', [LoginController::class, 'handleFacebookCallback'])->middleware('http');
