<?php

namespace App\Http\Controllers;
use App\Book;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
         $books = Book::where('book_quantity', '!=' , 0)->latest()->paginate(9);
        return view('index', compact('books'));
    }
    public function approval(){

        return view('approval');
    }

}
