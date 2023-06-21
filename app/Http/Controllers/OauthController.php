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
use Illuminate\Support\Facades\Config;

class OauthController extends Controller
{
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

            $user = Helper::ifCredEmp($user);

            $newUser = User::create([

                'name' => $user->name,
                'username' => $user->nickname,
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

        return Socialite::driver('facebook')->stateless()->redirect();
    }

    public function handleFacebookCallback()
    {/*  */
        date_default_timezone_set('Asia/Jakarta');

        $user = Socialite::driver('facebook')->stateless()->user();

        $finduser = User::where('facebook_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');

        } else {

            $timestamp = time();
            $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
            $formattedDateTime; 

            var_dump($user->token);

            $user = Helper::ifCredEmp($user);

            $newUser = User::create([

                'name' => $user->name,
                'username' => $user->nickname,
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

    public function redirectToGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function handleGithubCallback()
    {/*  */
        date_default_timezone_set('Asia/Jakarta');

        $user = Socialite::driver('github')->stateless()->user();

        $finduser = User::where('github_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');

        } else {

            $timestamp = time();
            $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
            $formattedDateTime; 

            var_dump($user->token);

            $user = Helper::ifCredEmp($user);

            $newUser = User::create([

                'name' => $user->name,
                'username' => $user->nickname,
                'email' => $user->email,
                'password' => Hash::make(Helper::generateRandomString()),
                'user_level' => 'user',
                'profile_photo' => $user->avatar,
                'google_id' => null,
                'facebook_id' => null,
                'github_id' => $user->id,
                'remember_token' => Helper::generateRandomString(),
                'email_verified_at' => $formattedDateTime
            ]);

            Auth::login($newUser);

            return redirect()->back();
        }
    }
    public function redirectToGitlab()
    {
        return Socialite::driver('gitlab')->stateless()->redirect();
    }

    public function handleGitlabCallback()
    {/*  */
        date_default_timezone_set('Asia/Jakarta');

        $user = Socialite::driver('gitlab')->stateless()->user();

        $finduser = User::where('gitlab_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');

        } else {

            $timestamp = time();
            $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
            $formattedDateTime; 

            var_dump($user->token);

            $user = Helper::ifCredEmp($user);

            $newUser = User::create([

                'name' => $user->name,
                'username' => $user->nickname,
                'email' => $user->email,
                'password' => Hash::make(Helper::generateRandomString()),
                'user_level' => 'user',
                'profile_photo' => $user->avatar,
                'google_id' => null,
                'facebook_id' => null,
                'github_id' => null,
                'gitlab_id' => $user->id,
                'remember_token' => Helper::generateRandomString(),
                'email_verified_at' => $formattedDateTime
            ]);

            Auth::login($newUser);

            return redirect()->back();
        }
    }
}
