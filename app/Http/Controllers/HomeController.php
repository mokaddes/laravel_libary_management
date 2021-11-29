<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Rent;
use App\Models\User;
use Carbon\Carbon;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $rents = Rent::latest()->paginate(5);
        return view('home', compact('rents'))->with('i', ($request->input('page', 1) -1) *5);

    }
    public function dashboard()
    {
        return view('dashboard');
    }
}
