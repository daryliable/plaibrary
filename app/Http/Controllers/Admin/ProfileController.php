<?php

namespace App\Http\Controllers\Admin;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function __construct()
    { 
        $this->middleware('role:superadministrator');

    }

   public function index()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
      return  view('admin.profile', compact('user')); 
    }

     public function edit()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
      return  view('admin.editprofile', compact('user')); 
    }

    public function update(User $user){

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $data2 = request()->validate([
        'name' => 'required',     
        ]);
        $data = request()->validate([
            'gender' => '',
            'civil' => '',
            'birthdate' => '',
            'address' => '',
            'contact_num' => '',
        ]);
         $user->update($data2);
        $user->profile->update($data);
        return redirect()->route('admin.profile.show')->with('success', 'Successfully updated profile.');;
    }

    public function updatepassword(Request $request, User $user){
       $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $changePassword = false;

        $rules = [
       'email' => 'required|unique:users,email,'. $id,
        ];
          

         if (!is_null($request->password) || !is_null($request->password_confirmation)) {
          $rules['password'] = 'required|min:8|max:20|confirmed';
          $changePassword = true;
         }
         $this->validate($request, $rules);


         $user->email = ($request->email);
         if ($changePassword) {
         $user->password = bcrypt($request->password);
         }

     $user->save();
     return redirect()->route('admin.profile.show')->with('success', 'Successfully updated user email & password.');
    }

}
