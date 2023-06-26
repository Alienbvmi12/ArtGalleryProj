<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post_likeComment extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'user',
        'post'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function post(){
        return $this->belongsTo(Post::class, 'post_id');
    }
}
