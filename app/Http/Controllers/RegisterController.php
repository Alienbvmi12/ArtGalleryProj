<?php

namespace App\Http\Controllers;

use App\Models\User;
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
            'name' => 'required|max:255',
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

        Auth::login($user);

        event(new Registered($user));

        $request->session()->flash('success', 'Berhasil register!! silahkan login');

        return redirect(route('verification.notice'));

    }
}
