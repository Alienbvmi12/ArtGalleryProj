<?php

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OauthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\PostResourceController;
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
    } elseif (Auth::check() && !isset(auth()->user()->email_verified_at)) {
        return redirect(route('verification.notice'));
    } else {
        return view('landing');
    }
});


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'loginView'])->name('login');
    Route::get('/register', [RegisterController::class, 'registerView']);
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/register', [RegisterController::class, 'register']);

    //oauth

    Route::get('auth/{app}', [OauthController::class, 'redirectToProvider']);
    Route::get('auth/{app}/callback', [OauthController::class, 'handleCallback']);

    //Lupa password

    Route::get('/forgot-password', [ResetPasswordController::class, 'forgot_password_view'])->name('password.request');
    Route::post('/forgot-password', [ResetPasswordController::class, 'send_reset_token'])->name('password.email');

});

//Reset Password

Route::get('/reset-password', [ResetPasswordController::class, 'reset_password_view'])->name('password.reset');
Route::post('/reset-password', [ResetPasswordController::class, 'send_reset_password'])->name('password.update');

Route::middleware(['auth', 'verified'])->group(function () {

    // Logout

    Route::post('/logout', [LoginController::class, 'logout']);

    // Posts

    Route::resource('/post', PostResourceController::class);

    // Gambar Anime random

    Route::get('/image/anime', function () {
        $client = new Client();
        $request = $client->get('https://kyoko.rei.my.id/api/dance.php?r=1');
        $body = json_decode((string)$request->getBody());
        return redirect($body->apiResult->url[0]);
    })->name('anime');

    // Profile

    Route::get('/profile/{user:username}', [UserProfileController::class, 'show']);
    Route::put('/profile/{biodata}', [UserProfileController::class, 'update']);
});

//Konfirmasi email

Route::get('/email/verify', function () {
    return view('register.verify-email', ['title' => 'Verify email']);
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/login');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
