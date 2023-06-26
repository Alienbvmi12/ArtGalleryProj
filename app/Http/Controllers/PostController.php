<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post_likeComment;

class PostController extends Controller
{
    public function like($id)
    {
        $count = Post_likeComment::where('post_id', $id)->where('user_id', auth()->user()->id)->get();
        if (count($count) > 0) {
            Post_likeComment::where('post_id', $id)->where('user_id', auth()->user()->id)->delete();
            return 'deleted';
        } else {
            Post_likeComment::create([
                'post_id' => $id,
                'user_id' => auth()->user()->id
            ]);
            return 'liked';
        }
    }
}
