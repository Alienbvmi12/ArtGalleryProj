<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

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
            'password' => 'required|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        $validatedData['user_level'] = 'user';
        $validatedData['ban_data_id'] = null;

        User::create($validatedData);

        $request->session()->flash('success', 'Berhasil register!! silahkan login');

        return redirect('/login');

    }
}
