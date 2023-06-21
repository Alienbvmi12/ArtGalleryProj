<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostController extends Controller
{
    public function all(){
        return view('post.posts', [
            'title' => 'All Post',
            'active' => 'blogposts',
            'posts' => Post::latest()
                            ->paginate(10)
                            ->withQueryString(),
        ]);
    }

    public function find(Post $post){
        return view('post', [
            'title' => 'Post by '.$post->author->name,
            'active' => 'blog',
            'post' => $post
        ]);
    }
}
