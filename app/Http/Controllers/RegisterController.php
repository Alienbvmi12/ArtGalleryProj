<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Album;
use App\Helper\Helper;
use App\Models\Biodata;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class RegisterController extends Controller
{
    public function registerView(){
        return view('register.index', [
            'title' => 'Register'
        ]);
    }

    public function register(Request $request){
        $validatedData = $request->validate([
            'email' => 'required|max:255|email:dns|unique:users,email',
            'username' => 'required|max:255|min:3|unique:users,username',
            'password' => 'required|max:255|confirmed',
            'g-recaptcha-response' => 'required|recaptcha'
        ],
        [
            'g-recaptcha-response.required' => 'Please complete the ReCaptcha',
            'g-recaptcha-response.recaptcha' => 'Captcha verification failed',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['user_level'] = 'user';
        $validatedData['ban_data_id'] = null;

        $user = User::create($validatedData);

        Biodata::create([
            'user_id' => $user->id,
            'first_name' => 'New',
            'last_name' => 'User',
            'gender' => null,
            'born' => fake()->date(),
            'country' => 'None',
            'hobby' => Helper::getHobby(),
            'descriptions' => 'Hello new User!!',
        ]);

        Album::create([
            'title' => 'Main',
            'subtitle' => fake()->paragraph(),
            'cover_image' => 'https://picsum.photos/' . rand(300, 1000) . '/' . rand(300, 1000) . '?nocache=' . microtime(),
            'privacy' => 'public',
            'user_id' => $user->id
        ]);

        Auth::login($user);

        event(new Registered($user));

        $request->session()->flash('success', 'Berhasil register!! silahkan login');

        return redirect(route('verification.notice'));

    }
}
