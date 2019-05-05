<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookRating extends Model
{
    
    protected $fillable = [
        'user_id','book_id','rate'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }
    public function book() {
        return $this->belongsTo('App\Book');
    }
}
