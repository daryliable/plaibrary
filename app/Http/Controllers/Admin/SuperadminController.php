<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
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
        
      
        $students = User::pluck('name');
        dd($students);
        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0,0);
        
        foreach($months as $index => $month)
        {
            $datas[$month] = $students[$index];
           
        }
    
        return view('admin.index', compact('noOfStudents', 'noOfLibrarians', 'noOfRequest', 'noOfUploads','datas'));
        
    }
}
