<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Reservation;
use App\Book;
class ReservationController extends Controller
{
    public function __construct()
    {
    $this->middleware('role:librarian');
    }

     public function pending(Reservation $reservations){
        $reservations = Reservation::where('status', '=', 1)->get();
        return view('librarian.pendingreservation', compact('reservations'));
    }

    public function approve(Reservation $reservation){
    $reservation->status = 2;
    $reservation->save();
    return back()->with('success', 'Request Accepted');
    }

    public function list_approved(){

        $reservations = Reservation::where('status', '=', 2)->get();
        return view('librarian.reservation', compact('reservations'));
    }

    public function cancel_reservation(Book $book, $reservation_id){
    $reservation = Reservation::where('id',  $reservation_id);
    $reservation->status = 0;
    $book_id = $reservation->value('book_id');
    $book = Book::findOrFail($book_id);
    $book->book_quantity = $book->book_quantity+1;
    $book->save();
    $reservation->delete();
    return back()->with('success', 'Succesfully reject the user request.');
    }
}
