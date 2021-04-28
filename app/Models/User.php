<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_picture',
        'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function friendsOfMine()
    {
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id_1', 'user_id_2');
    }


    public function friendOf()
    {
        return $this->belongsToMany('App\Models\User', 'friends', 'user_id_2', 'user_id_1');
    }

    public function friends()
    {
        return $this->friendsOfMine->merge($this->friendOf);
    }


    public function posts()
    {
        return $this->hasMany('App\Models\post');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\category');
    }
}
