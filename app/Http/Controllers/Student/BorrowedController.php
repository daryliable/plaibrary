<?php

namespace App\Http\Controllers\Student;
use App\Reservation;
use App\Book;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowedController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }
    
     public function index(){
     $id = Auth::user()->id;
     $myborrowbooks = Reservation::where('student_id', $id)->where('status', '=', 2)->get();
     return  view('student.borrowedbooks', compact('myborrowbooks')); 
}
    public function return(Book $book, $reservation_id){
    $reservation = Reservation::where('id',  $reservation_id);
    $resUpdate = [
        'status' => $reservation->status = 3,
    ];
    $book_id = $reservation->value('book_id');
    $book = Book::findOrFail($book_id);
    $book->book_quantity = $book->book_quantity+1;
    $book->save();  
    $updateReservation = Reservation::where ('id', $reservation_id)->update($resUpdate);
    return back()->with('success', 'Succesfully returned the book.');
    }
}
