<?php

namespace App\Http\Controllers;

use App\Models\Rent;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;

class RentController extends Controller
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
        $rents = Rent::latest()->paginate(5);
        if(request('search')){
            $rents = Rent::latest()
            ->where('issue_date', 'like', '%'.request('search'). '%')
            ->orwhere('return_date', 'like', '%'.request('search'). '%')
            ->join('users', 'rents.user_id', '=', 'users.id')
            ->select('rents.*', 'users.name')
            ->orWhere('users.name', 'like', '%'.request('search'). '%')
            ->join('books', 'rents.book_id', '=', 'books.id')
            ->select('rents.*', 'books.name')
            ->orWhere('books.name', 'like', '%'.request('search'). '%')
            ->paginate(5);
        }
        return view('rents.index', compact('rents'))->with('i', ($request->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $books = Book::all();
        $rents = Rent::all();
        return view('rents.create', compact('rents', 'users', 'books'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rents = new Rent;
        $rents->user_id = $request->user_id;
        $rents->book_id = $request->book_id;
        $rents->issue_date = $request->issue_date;
        $rents->return_date = $request->return_date;
        $rents->save();

        return redirect()->route('rents.index')->with('success', 'Successfuly rented');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        return view('rents.return', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        $users = User::all();
        $books = Book::all();
        return view('rents.edit', compact('rent', 'users', 'books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        $rent->user_id = $request->user_id;
        $rent->book_id = $request->book_id;
        if(!empty($request->issue_date)) {
            $rent->issue_date = $request->issue_date;
        }
        if(!empty($request->return_date)) {
            $rent->return_date = $request->return_date;
        }
        if(!empty($request->is_return)) {
            $rent->is_return = $request->is_return;
        }

        $rent->update();
        return redirect()->route('rents.index')->with('success', 'Successfuly rented');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        $rent->delete();
        return redirect()->route('rents.index')->with('delete', 'Successfuly Deleted');
    }

    public function is_return(Request $request, Rent $rent)
    {
        // $rent = Rent::find($id);
        $rent->is_return = $request->is_return;
        $rent->save();
        return redirect()->route('book_return')->with('success', 'Successfuly rented');
    }

    public function book_return(Request $request)
    {
        $rents = Rent::latest()->paginate(5);
        return view('rents.book-return', compact('rents'))->with('i', ($request->input('page', 1) -1) *5);
    }
    public function not_return(Request $request)
    {
        $rents = Rent::latest()->paginate(5);
        return view('rents.not-return-book', compact('rents'))->with('i', ($request->input('page', 1) -1) *5);
    }
}
