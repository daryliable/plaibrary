<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Book;
use App\Reservation;
class SuperadminController extends Controller
{
public function __construct()
    { 
        $this->middleware('role:superadministrator');
    }

public function index()
    {
        $noOfStudents = User::whereRoleIs('student')->where('approved', '=', 1)->count();
        $noOfLibrarians = User::whereRoleIs('librarian')->where('approved', '=', 1)->count();
        $noOfRequest = User::where('approved', '!=' , 1)->count();
        $noOfUploads = Book::count();
        
        $reserve = Reservation::all()->pluck('id');
      
        $students = User::select(DB::raw("COUNT(*) as count"))
                        ->whereRoleIs('student')
                        ->where('approved', '=', 1)
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('count');
        $months = User::select(DB::raw("Month(created_at) as month"))
                        ->whereRoleIs('student')
                        ->where('approved', '=', 1)
                        ->whereYear('created_at',date('Y'))
                        ->groupBy(DB::raw("Month(created_at)"))
                        ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        
        foreach($months as $index => $month)
        {
            $datas[$month] = $students[$index];
           
        }
    
        return view('admin.index', compact('noOfStudents', 'noOfLibrarians', 'noOfRequest', 'noOfUploads','datas'));
        
    }
}
