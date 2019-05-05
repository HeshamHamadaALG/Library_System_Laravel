<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Comment;
use App\CommentRating;
use App\Favourite;

class BookIdController extends Controller
{

    // Dispaly One Book Category

    public function bookid($bkId)
    {
        $Book = Book::all()->where('id', $bkId);
        $related = Book::all();
        $Categories = Category::all();
        $rates = BookRating::all();
        $comments = Comment::all();
        $commRate = CommentRating::all();
        $favourite = Favourite::all();
        return view('bookid', ['books' => $Book,'Cates' => $Categories, 'rates' => $rates,'related' => $related, 'comment' => $comments, 'comRate' => $commRate, 'fav' => $favourite]);
    }

}

