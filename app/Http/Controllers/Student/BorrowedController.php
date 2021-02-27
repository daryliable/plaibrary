<?php

namespace App\Http\Controllers\Student;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BorrowedController extends Controller
{
     public function index(){
     $id = Auth::user()->id;
     $myborrowbooks = Reservation::where('student_id', $id)->where('status', '=', 2)->get();
     return  view('student.borrowedbooks', compact('myborrowbooks')); 
}
}
