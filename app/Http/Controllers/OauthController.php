<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\User;
use App\Models\Album;
use App\Helper\Helper;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Config;
use Laravel\Socialite\Facades\Socialite;

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

        $finduser = User::where($app . '_id', $user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect()->intended('/');
        } else {

            $timestamp = time();
            $formattedDateTime = date('Y-m-d H:i:s', $timestamp);
            $formattedDateTime;

            var_dump($user->token);

            $user = Helper::ifCredEmp($user);

            $verNick = User::where('username', $user->nickname)->get();

            if(count($verNick) > 0){
                $user->username = fake()->userName();
            }

            $newUser = User::create([
                'username' => $user->nickname,
                'email' => $app . 'user' . date('ymdHis', $timestamp) . Helper::generateRandomString(2) . '@email.com',
                'password' => Hash::make(Helper::generateRandomString()),
                'user_level' => 'user',
                'profile_photo' => $user->avatar,
                $app . '_id' => $user->id,
                'remember_token' => Helper::generateRandomString(),
                'email_verified_at' => $formattedDateTime
            ]);

            Biodata::create([
                'user_id' => $newUser->id,
                'first_name' => $user->name,
                'last_name' => 'User',
                'gender' => null,
                'born' => fake()->date(),
                'country' => 'None',
                'hobby' => Helper::getHobby(),
                'descriptions' => 'Hello new '.$app.' User!!',
            ]);

            Album::create([
                'title' => 'Main',
                'subtitle' => fake()->paragraph(),
                'cover_image' => 'https://picsum.photos/' . rand(300, 1000) . '/' . rand(300, 1000) . '?nocache=' . microtime(),
                'privacy' => 'public',
                'user_id' => $newUser->id
            ]);


            Auth::login($newUser);

            return redirect()->back();
        }
    }
}
