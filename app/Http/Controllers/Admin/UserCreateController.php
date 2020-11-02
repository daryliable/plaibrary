<?php

namespace App\Http\Controllers\Admin;
use App\Role;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserCreateController extends Controller
{
      public function __construct()
    { 
        $this->middleware('role:superadministrator');

    }
    public function index(){
         $roles = Role::all();
        return view('admin.adduser', compact('roles'));
    }

     public function adduser(Request $request)
    {

        $user = request()->validate([   
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            
        ]);
        $user->save();
        $user->attachRoles(explode(',', $request->roles));
        return back()->with('success', 'Successfully added new user.');
    }
}
