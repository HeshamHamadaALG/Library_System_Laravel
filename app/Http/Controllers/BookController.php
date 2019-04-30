<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Comment;
use App\CommentRating;
use Illuminate\Support\Facades\Auth;

class BookController extends Controller
{
    //
    public function index()
    {
        $allBooks = Book::paginate(3);
        $Categories = Category::all();
        $rates = BookRating::all();
        return view('books', ['books' => $allBooks,'Cates' => $Categories, 'rates' => $rates]);
    }

    // Dispaly By Category

    public function category($catId)
    {
        $allBooks = Book::where('cat_id', $catId)->paginate(3);
        $Categories = Category::all()->where('id', $catId);
        $rates = BookRating::all();
        return view('books', ['books' => $allBooks,'Cates' => $Categories, 'rates' => $rates]);
    }

    public function show($bookId)
    {

        $Book = Book::all()->where('id', $bookId);
        $Categories = Category::all()->where('id', $bookId);
        $rates = BookRating::all();
        $comments = Comment::all();
        $commRate = CommentRating::all();
        return view('bookid', ['books' => $Book,'Cates' => $Categories, 'rates' => $rates, 'comments' => $comments, 'comRate' => $commRate]);
    }


      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function addComment(Request $request)
    {
        $request->validate([
            'text'=>'required',
          ]);
    
          $comment = new Comment([
            'text' => $request->get('text'),
            'user_id'=> Auth::id(),
            'book_id'=> $request->get('bookID'),
          ]);

          $comment->save();
          return redirect('/books/'.$request->get('bookID'));
    }


    

}

