<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Favourite;

class FavoriteController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fav = new Favourite();
        $request->validate([
            'bkId', 
            'uId'            
            ]);
        $fav->book_id = $request->get('bkId');
        $fav->user_id = $request->get('uId');
        $fav->save();
        return redirect('/books');
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Favourite::destroy($id);
        return redirect('/books'); 
    }
}

