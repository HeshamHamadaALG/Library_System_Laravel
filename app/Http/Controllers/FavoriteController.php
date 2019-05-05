<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Favourite;
use Illuminate\Support\Facades\Auth;


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
        return redirect()->back();
    }

        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book_id)
    {
        Favourite::where([['book_id',$book_id],['user_id',Auth::id()]])->delete();
        return redirect()->back(); 
    }
}

