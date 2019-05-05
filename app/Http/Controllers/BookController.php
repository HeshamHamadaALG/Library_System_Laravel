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
        
        $Categories = Category::all()->where('id', $bookId);
        $rates = BookRating::all();
        $related = Book::all();
        $comments = Comment::all();
        $hoba = $comments[0]->commentRatings->where('user_id',Auth::id())->first()->rate;
        $hoba = $comments[0]->commentRatings->avg('rate');
        $commRate = CommentRating::all();
        return view('bookid', ['hoba'=>$hoba,'books' => $Book,'Cates' => $Categories, 'rates' => $rates,'related' => $related, 'comments' => $comments, 'comRate' => $commRate]);
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


    public function rateComment(Request $request)
    {
        $request->validate([
            'bookId'=>'required',
            'comment_id'=>'required',
            'currRating'=>'required',
          ]);
        $newCommentRating = CommentRating::updateOrCreate([
            'book_id' => $request->get('bookId'),
            'comment_id' => $request->get('comment_id'),
            'user_id'=> Auth::id()
            ],['rate'=> $request->get('currRating')]);
        //   'rate'=> 
          $newCommentRating->save();
        return ('done');
    } 
    

}

