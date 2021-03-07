<?php

namespace App\Http\Controllers;
use App\Book;
use App\Role;
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
        $books = Book::where('id', '>' , 0)->latest()->paginate(6);
        $roles = Role::where('id', '>' , 0)->get();
        return view('index', compact('books','roles'));
    }
    public function approval(){

        return view('approval');
    }

}