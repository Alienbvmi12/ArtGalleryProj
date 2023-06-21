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

        if (Auth::attemptWhen($credentials, function(User $user){
            return isset($user->email_verified_at);
        })) {
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

}
