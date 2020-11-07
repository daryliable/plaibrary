<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
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
        
         $users = User::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');

        return view('admin.index', compact('noOfStudents', 'noOfLibrarians', 'noOfRequest', 'noOfUploads','users'));
        
    }
    public function userChart(){

    }
}
