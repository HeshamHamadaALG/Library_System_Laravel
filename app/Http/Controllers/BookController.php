<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;
use App\BookRating;

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
    

}

