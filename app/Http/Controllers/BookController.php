<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role != 1) {
            return redirect()->route('home')->with('status', 'You are not an Admin');
        }

        $books = Book::latest()->paginate(10);
        if(request('search')){
            $books = Book::latest()
            ->Where('name', 'like', '%' . request('search') . '%')
            ->orWhere('author', 'like', '%'. request('search') . '%')
            ->paginate(10);
        }
        return view('books.index', compact('books'))->with('i', ($request->input('page', 1) -1) *10);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('books.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $books_name = $request->get('name');
        // $author_name = $request->author;
        // // // dd($books);
        // $books_name = is_array($books_name) ? $books_name : array($books_name);
        // $author_name = is_array($author_name) ? $author_name : array($author_name);
        $books = $request->all();
        if (!empty($books) && is_array($books)) {
            foreach($books['name'] as $key => $name)
            {
                Book::create([
                    'name' => $name,
                    'author' => $books['author'][$key],
                ]);
            }
        }
    // dd($books);
        return redirect()->route('books.index')->with('success', 'Books added');

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        return view('books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->name = $request->name;
        $book->author = $request->author;
        $book->update();
        return redirect()->route('books.index')->with('success', 'Edited');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()->route('books.index')->with('delete', 'Book deleted Successfully');
    }
}
