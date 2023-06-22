<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Album;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function profile(User $user)
    {
        return view('profile.index', [
            'title' => 'Profile',
            'user' => $user,
            'posts' => Post::latest()
                ->where('user_id', $user->id)
                ->paginate(10)
                ->withQueryString(),
            'albums' => Album::latest()
                ->paginate(10)
                ->withQueryString()
        ]);
    }
}
