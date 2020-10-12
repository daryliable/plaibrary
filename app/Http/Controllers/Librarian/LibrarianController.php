<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
     public function __construct()
    {
        $this->middleware('role:librarian');
    }
    public function index()
    {
        return view('librarian.index');
    }
}
