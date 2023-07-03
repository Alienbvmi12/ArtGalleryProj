<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post_likeComment;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentLikeController extends Controller
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

    public function comment($id, $type){
        $typeClass = [
            'post' => 'App\Models\Post',
            'art' => 'App\Models\Art',
        ];
        Comment::create([
            'body' => request('body'),
            'commentable_id' => $id,
            'commentable_type' => $typeClass[$type]
        ]);
        return back();
    }
}
