<?php

namespace App\Http\Controllers\Student;
use App\Book;
use App\User;
use App\Reservation;
use App\Genre;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }
    public function index(User $user)
    {   
        $category = Genre::all();
        $books = Book::where('id', '>' , 0)->latest()->paginate(9);
        return view('student.index', compact('books','category'));
    }

    public function reserve(Reservation $reservation, Book $book){
        $bookId = request('book_id');
        $bookName = request('book_name');
        $librarian = Book::findOrFail($bookId);
        $book->book_quantity = $book->book_quantity-1;
        $reservation->lib_id = $librarian->user_id;
        $reservation->lib_name = $librarian->book_uploader;
        $reservation->status = 1;
        $reservation->student_name = Auth::user()->name;
        $reservation->student_id = Auth::user()->id;
        $reservation->book_id = $bookId;
        $reservation->book_name = $bookName;
        $book->save();
        $reservation->save();

        return redirect()->back()->with('success', 'Successfully appoint book: '. $book->book_name.' '.'wait librarian for confirmation');
    }
    
}
