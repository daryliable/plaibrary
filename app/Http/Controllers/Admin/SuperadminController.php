<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\Book;

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
       
        return view('admin.index', compact('noOfStudents', 'noOfLibrarians', 'noOfRequest', 'noOfUploads'));
    }
}
