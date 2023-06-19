<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Helper\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function loginView()
    {
        return view('login.index', [
            'title' => 'Login'
        ]);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => '',
            'password' => ''
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return back()->with('errorMsg', 'Incorrect email or password');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function redirectToGoogle()
    {

        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback()
    {/*  */
        date_default_timezone_set('Asia/Jakarta');

        $user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('google_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');

        } else {

            $timestamp = time();
            $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
            $formattedDateTime; 

            var_dump($user->token);

            $newUser = User::create([

                'name' => $user->name,
                'username' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(Helper::generateRandomString()),
                'user_level' => 'user',
                'profile_photo' => $user->avatar,
                'google_id' => $user->id,
                'facebook_id' => null,
                'remember_token' => Helper::generateRandomString(),
                'email_verified_at' => $formattedDateTime
            ]);

            Auth::login($newUser);

            return redirect()->back();
        }
    }
    public function redirectToFacebook()
    {

        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {/*  */
        date_default_timezone_set('Asia/Jakarta');

        $user = Socialite::driver('facebook')->user();

        $finduser = User::where('facebook_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');

        } else {

            $timestamp = time();
            $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
            $formattedDateTime; 

            var_dump($user->token);

            $newUser = User::create([

                'name' => $user->name,
                'username' => $user->name,
                'email' => $user->email,
                'password' => Hash::make(Helper::generateRandomString()),
                'user_level' => 'user',
                'profile_photo' => $user->avatar,
                'google_id' => null,
                'facebook_id' => $user->id,
                'remember_token' => Helper::generateRandomString(),
                'email_verified_at' => $formattedDateTime
            ]);

            Auth::login($newUser);

            return redirect()->back();
        }
    }
}
