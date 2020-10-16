<?php

namespace App\Http\Controllers\Student;
use App\Book;
use App\User;
use App\Reservation;
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

        $books = Book::where('id', '>' , 0)->latest()->paginate(9);
        return view('student.index', compact('books'));
    }

    public function reserve(Reservation $reservation, Book $book){
        $book->book_quantity = $book->book_quantity-1;
        $reservation->user_id = Auth::user()->id;
        $reservation->book_id = request('book_id');
        $book->save();
        $reservation->save();
        return redirect()->back()->with('success', 'Successfully reserve book: '. $book->book_name);
    }
}
