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
    public function redirectToProvider($app)
    {

        return Socialite::driver($app)->redirect();
    }

    public function handleCallback($app)
    {/*  */
        date_default_timezone_set('Asia/Jakarta');

        $user = Socialite::driver($app)->stateless()->user();

        $finduser = User::where($app.'_id', $user->id)->first();

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
                'email' => $app.'user'.date('ymdHis', $timestamp).Helper::generateRandomString(2).'@email.com',
                'password' => Hash::make(Helper::generateRandomString()),
                'user_level' => 'user',
                'profile_photo' => $user->avatar,
                $app.'_id' => $user->id,
                'remember_token' => Helper::generateRandomString(),
                'email_verified_at' => $formattedDateTime
            ]);

            Auth::login($newUser);

            return redirect()->back();
        }
    }
}
