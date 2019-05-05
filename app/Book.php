<?php 

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    //
    use SoftDeletes;

    public function category()
    {
        return $this->belongsTo('App\Category', 'cat_id');
    }

    public function bookRatings()
    {
        return $this->hasMany('App\BookRating');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function commentRatings()
    {
        return $this->hasMany('App\CommentRating');
    }

    public function favourites()
    {
        return $this->hasMany('App\Favourite');
    }

    public function leases()
    {
        return $this->hasMany('App\Lease');
    }
}
