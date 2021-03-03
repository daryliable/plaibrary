<?php

namespace App\Http\Controllers\Librarian;
use App\Book;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:librarian');
    }
    public function dashboard()
    {
        $user = Auth::user()->id;

        $bookUploaded = Book::where('user_id', $user)->count();
        $noAppointments = $reservations = Reservation::where(['status' => 2,'lib_id' => $user,])->count();
        $noReturned = $reservations = Reservation::where(['status' => 3,'lib_id' => $user,])->count();
        return view('librarian.dashboard', compact('bookUploaded','noAppointments','noReturned'));
    }
}
