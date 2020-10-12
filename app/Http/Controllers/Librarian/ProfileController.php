<?php

namespace App\Http\Controllers\Librarian;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function __construct()
    {
    $this->middleware('role:librarian');
    }

     public function index(User $user)
    {
      $id = Auth::user()->id;
      $user = User::findOrFail($id);
      return  view('librarian.profile', compact('user')); 
    }

     public function edit(User $user)
    {
      $id = Auth::user()->id;
      $user = User::findOrFail($id);
      return  view('librarian.editprofile', compact('user')); 
    }

    public function update(User $user){
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        
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
          return redirect()->route('librarian.profile.show')->with('success', 'Successfully updated profile.');;
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
     return redirect()->route('librarian.profile.show')->with('success', 'Successfully updated user email & password.');
    }
}
