<?php

namespace App\Http\Controllers;

use App\Entry;
use Illuminate\Http\Request;

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
    public function index()
    {
        $entries = Entry::where('user_id',auth()->id())->paginate(5);
        return view('home',compact('entries'));
    }
}
