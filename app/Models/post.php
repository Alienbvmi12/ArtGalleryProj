<?php

namespace App\Models;

use App\Models\User;
use App\Models\Album;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'author',
        'album'
    ];

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function album(){
        return $this->belongsTo(Album::class, 'album_id');
    }

    public function like(){
        return $this->hasMany(Post_likeComment::class);
    }
}
