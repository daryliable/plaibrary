<?php

namespace App\Http\Controllers\Student;
use App\User;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarrowedController extends Controller
{
    public function index(User $user){ 

        $id = Auth::user()->id;
        $student = User::findOrFail($id);
        $myborrowbooks = Reservation::where('student_id', $id)->where('status', '=', 2)->get();
        return  view('student.barrowedbooks', compact('student','myborrowbooks')); 
    }
}
