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
                    ->whereRoleIs('student')
                    ->where('approved', '=', 1)
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');
        $months = User::select(\DB::raw("Month(created_at) as month"))
                    ->whereRoleIs('student')
                    ->where('approved', '=', 1)
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('month');

        $datas = [0,0,0,0,0,0,0,0,0,0,0,0];

        foreach ($months as $index => $month)
        { 
                $month = $month - 1;
                $datas[$month] = $users[$index];

        }
       
        $appointment = DB::table('reservations')
                 ->select(DB::raw('count(*) as appointment'))
                 ->groupBy('lib_id')
                 ->pluck('appointment');

        $university = DB::table('reservations')
                 ->groupBy('lib_id')
                 ->pluck('lib_id');
        
     
      

 
        $authorizedRoles = ['librarian','superadministrator'];
        $appointmentName = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
                   return $query->whereIn('name', $authorizedRoles);
             })->where('approved', '=', 1)->get();
       
      

        return view('admin.index', compact('noOfStudents', 'noOfLibrarians', 'noOfRequest', 'noOfUploads','datas','appointment','university'));
  
    }
}
