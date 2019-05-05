<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use SoftDeletes;
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','is_active','type','NationalID'
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

    public function bookRatings() {
        return $this->hasMany('App\BookRating');
    }

    public function comments() {
        return $this->hasMany('App\Comment');
    }

    public function commentRatings(){
        return $this->hasMany('App\CommentRating');
    }

    public function favourites() {
        return $this->hasMany('App\Favourite');
    }

    public function leases() {
        return $this->hasMany('App\Lease');
    }

}
