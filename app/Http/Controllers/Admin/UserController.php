<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Role;

class UserController extends Controller
{ 
     public function __construct()
    { 
        $this->middleware('role:superadministrator');
    }
    public function index()
    {
        
        $roles = Role::all();
        $users = User::where('approved', '=' , 1)->latest()->get();
        return view('admin.usermanagement', ['users' => $users,'roles'=> $roles ]);
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
            'image_url' => $request['image']
        ]);
        $user->save();
        $user->attachRoles(explode(',', $request->roles));
        return back()->with('success', 'Successfully added new user.');
    } 
    public function delete_user($user_id)
    {
        User::where ('id',  $user_id)->delete();
        return back()->with('success', 'Successfully deleted user.');
    }

    public function viewuser_prof(int $userId, Request $request){
        $user = User::findOrFail($userId);

        return view('admin.viewuser', compact('user'));
    }

    public function edituser_prof(User $user){

        return  view('admin.edituser_profile', compact('user')); 
    }

    public function update_userprof(User $user){

        $data2 = request()->validate([
        'name' => 'required',     
        ]);
        $user->update($data2);

        $data = request()->validate([
            'gender' => '',
            'civil' => '',
            'birthdate' => '',
            'address' => '',
            'contact_num' => '',
        ]);

        $user->profile->update($data);
        return redirect("/viewprof/$user->id")->with('success', 'Successfully updated user.'); ;
    }
}
