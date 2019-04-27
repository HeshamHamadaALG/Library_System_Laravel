<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function books() {
        return $this->hasMany('App\Book');
    }
}
