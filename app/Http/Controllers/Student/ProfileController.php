<?php

namespace App\Http\Controllers\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }
   public function profile(User $user)
    {
        $id = Auth::user()->id;
        $student = User::findOrFail($id);
      return  view('student.profile', compact('student')); 
    }

     public function edit(User $user)
    {
        $id = Auth::user()->id;
        $student = User::findOrFail($id);
      return  view('student.editprofile', compact('student')); 
    }
    public function update(User $user)
    {
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
        return redirect()->route('student.profile.show')->with('success', 'Successfully updated profile.');;
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
     return redirect()->route('student.profile.show')->with('success', 'Successfully updated user email & password.');
    }
}
