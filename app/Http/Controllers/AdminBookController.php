<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Category;

class AdminBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::all();
        $categories = Category::all();

        return view('books/index', compact('books', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('books.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'author' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,JPEG,JPG,PNG',
            'feesPerDay' => 'required|numeric',
            'numberOfCopies' => 'required|numeric',
            'cat_id' => 'required',
        ]);
        $books = new Book();
        $books->title = $request->title;
        $books->description = $request->description;
        $books->author = $request->author;
        $books->cat_id = $request->cat_id;
        $books->image = $request->image->move('bookphotos', str_random(6) . time() . $request->image->getClientOriginalName());
        $books->feesPerDay = $request->feesPerDay;
        $books->numberOfCopies = $request->numberOfCopies;
        $books->save();

        return redirect('admins/adminbooks')->with('success', 'Book is successfully saved');
        // $book = Book::create($validatedData);

        // return redirect('/books')->with('success', 'Book is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book = Book::findOrFail($id);

        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required|max:500',
            'author' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,jpg,png,JPEG,JPG,PNG',
            'feesPerDay' => 'required|numeric',
            'numberOfCopies' => 'required|numeric',
        ]);
        Book::whereId($id)->update($validatedData);

        return redirect('/adminbooks')->with('success', 'Book is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::findOrFail($id);
        $book->delete();

        return redirect('/books')->with('success', 'Book is successfully deleted');
    }
}
