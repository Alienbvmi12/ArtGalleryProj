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
}
