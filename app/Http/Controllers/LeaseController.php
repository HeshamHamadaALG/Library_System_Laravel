<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Lease;
use Illuminate\Support\Facades\Auth;


class LeaseController extends Controller
{
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lease = new Lease();
        $request->validate([
            'bkId',
            'uId',
            'lease'
            ]);
        $lease->book_id = $request->get('bkId');
        $lease->user_id = $request->get('uId');
        $lease->price = $request->get('lease');
        $lease->save();
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
        Lease::where([['book_id',$book_id],['user_id',Auth::id()]])->delete();
        return redirect()->back();
    }
}
