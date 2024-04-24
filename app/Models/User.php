<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
        'is_approved',
        // Student specific
        'cb_number',
        'batch',
        'school',
        'level',
        'degree',

        //Alumni specific
        'graduated_year',
        'nic',
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
        'is_approved' => 'boolean',
    ];

    //Relationshps
    public function posts(){
        return $this->hasMany(Post::class, 'created_by');
    }

    public function likes(){
        return $this->belongsToMany(Post::class, 'post_like')->withTimestamps();
    }

    public function hasLiked(Post $blog)
    {
       
        return $this-> likes()->where('post_id', $blog->id)->exists();
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function survey(){
        return $this->hasMany(Survey::class, 'crated_by');
    }
}

