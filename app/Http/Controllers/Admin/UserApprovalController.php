<?php

namespace App\Http\Controllers\Admin;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserApprovalController extends Controller
{
    public function __construct()
    { 
        $this->middleware('role:superadministrator');

    }
public function index(User $users){

$users = User::where('approved', '!=' , 1)->get();

return view('admin.pendinguser', compact('users'));
}

public function approve(User $user){

  $user->approved = 1;
  $user->save();
  return back()->with('success', 'Succesfully approved the user request.');
}

public function reject_user($user_id){
    User::where ('id',  $user_id)->delete();
    return back()->with('success', 'Succesfully reject the user request.');
}
}
