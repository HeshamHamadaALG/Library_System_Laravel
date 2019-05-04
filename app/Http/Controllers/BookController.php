<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;
use App\Comment;
use App\CommentRating;
use Illuminate\Support\Facades\Auth;
use App\Favourite;

class BookController extends Controller
{
    //
    public function index()
    {
        $allBooks = Book::paginate(3);
        $Categories = Category::all();
        $rates = BookRating::all();
        $favourite = Favourite::all();
        return view('books', ['books' => $allBooks,'Cates' => $Categories, 'rates' => $rates, 'fav' => $favourite]);
    }

    // Dispaly By Category

    public function category($catId)
    {
        $allBooks = Book::where('cat_id', $catId)->paginate(3);
        $Categories = Category::all()->where('id', $catId);
        $rates = BookRating::all();
        $favourite = Favourite::all();
        return view('books', ['books' => $allBooks,'Cates' => $Categories, 'rates' => $rates, 'fav' => $favourite]);
    }

    public function show($bookId)
    {

        $Book = Book::all()->where('id', $bookId);
        $related = Book::all();
        $Categories = Category::all();
        $rates = BookRating::all();
        $comments = Comment::all();
        $commRate = CommentRating::all();
        $favourite = Favourite::all()->where([
            'book_id' => $bookId,
            'user_id' => Auth::user()->id,
        ]);
        return view('bookid', ['books' => $Book,'Cates' => $Categories, 'rates' => $rates,'related' => $related, 'comments' => $comments, 'comRate' => $commRate, 'fav' => $favourite]);
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

