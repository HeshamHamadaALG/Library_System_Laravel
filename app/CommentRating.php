<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentRating extends Model
{
    //
    public function user() {
        return $this->belongsTo('App\User');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
    public function comment() {
        return $this->belongsTo('App\Comment');
    }
}
