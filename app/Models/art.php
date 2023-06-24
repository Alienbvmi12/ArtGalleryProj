<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Art extends Model
{
    use HasFactory;

    protected $guarded = [
        'id'
    ];

    protected $with = [
        'author',
        'album'
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function album()
    {
        return $this->belongsTo(Album::class, 'album_id');
    }
}
