<?php

namespace App\Http\Controllers\Student;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class pendingappController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }
    public function index( Reservation $reservations){
        
        $id = Auth::user()->id;
        $pendingapp = Reservation::where('student_id', $id)->where('status', '=', 1)->get();
        return view('student.pendingapp', compact('pendingapp')); 
    }
}
