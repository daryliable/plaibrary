<?php

namespace App\Http\Controllers\Student;
use App\Book;
use App\Genre;
use Spatie\QueryBuilder\QueryBuilder;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:student');
    }
    public function filter(Request $request, Book $book)
{
    $category = Genre::all();
    $query = Book::all();
    
    $bookSearch = QueryBuilder::for(Book::class)
                ->allowedFilters(['book_name','book_author'])
                ->get();

    return $bookSearch;
    return view('student.search');
}

}

/*  $rules = [];
    if ($request->has('book_name')) {
    $rules['book_name'] = $request->book_name;
    }
    if ($request->has('book_author')) {
    $rules['book_author'] = $request->book_author;
    }
    */