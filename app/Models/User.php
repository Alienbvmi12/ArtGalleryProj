<?php

namespace App\Models;

use App\Models\Art;
use App\Models\Post;
use App\Models\Album;
use App\Models\Biodata;
use App\Models\Post_likeComment;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Scopes\AncientScope;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Providers\EventServiceProviderSendEmailVerificationNotification;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function arts(){
        return $this->hasMany(Art::class);
    }

    public function albums(){
        return $this->hasMany(Album::class);
    }

    public function biodata(){
        return $this->hasOne(Biodata::class);
    }

    public function likes(){
        return $this->hasMany(Post_likeComment::class);
    }

}
