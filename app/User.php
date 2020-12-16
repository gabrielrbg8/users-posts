<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'profile_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = Hash::make($value);
    }
    public function isAdmin(){
        return $this->profile_id === 1;
    }

    public function posts(){
        return $this->hasMany(Post::class, 'author');
    }

    public function archives(){
        return DB::table('posts')
            ->join('posts_files', 'posts_files.post', '=', 'posts.id')
            ->where('posts.author', '=', $this->attributes['id'])
            ->get();
    }

    public function profile(){
        return $this->hasOne(Profile::class, 'id', 'profile_id');
    }
}
