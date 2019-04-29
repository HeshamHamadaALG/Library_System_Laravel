<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Comment;
use App\CommentRating;

class BookIdController extends Controller
{

    // Dispaly One Book Category

    public function bookid($bkId)
    {
        $Book = Book::all()->where('id', $bkId);
        $Categories = Category::all()->where('id', $bkId);
        $rates = BookRating::all();
        $comments = Comment::all();
        $commRate = CommentRating::all();
        return view('bookid', ['books' => $Book,'Cates' => $Categories, 'rates' => $rates, 'comment' => $comments, 'comRate' => $commRate]);
    }

}

