<?php

namespace App\Http\Controllers\Student;
use App\User;
use App\Profile;
use App\Reservation;
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
        $myborrowbooks = Reservation::where('student_id', $id)->where('status', '=', 2)->get();
      return  view('student.profile', compact('student','myborrowbooks')); 
    }

     public function edit(User $user)
    {
        $id = Auth::user()->id;
        $student = User::findOrFail($id);
      return  view('student.editprofile', compact('student')); 
    }
    public function update(Request $request)
    {
         $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $rules = [
            'name' => '',
            'gender' => '',
            'civil' => '',
            'birthdate' => '',
            'address' => '',
            'contact_num' => '',
            'coll_univ' => '',
        ];    

         if ($request->has('profile')) {
            $rules['profile'] = 'mimes:jpeg,jpg,png,gif|required|max:10000';
        }

        $this->validate($request, $rules);

        if ($request->has('profile')) {
             $time = time();
             $destination =  public_path() . '/images/user_images/' . $time .'_' .  str_replace(' ', '_', $request->file('profile')->getClientOriginalName());
             $imageName = $time . '_' . $request->file('profile')->getClientOriginalName();
             move_uploaded_file($request->file('profile'), $destination);
        }
        $user->name = $request->name;

        $profile = [
                'gender' => $request->gender,
                'civil' => $request->civil,
                'birthdate' => $request->birthdate,
                'address' => $request->address,
                'contact_num' => $request->contact_num,
                'coll_univ' => $request->coll_univ,
        ];

        if ($request->has('profile') && $imageName) {
            $profile['image_url'] = $imageName;
         }
      
        $user->save();
        $editProfileupdate = Profile::where ('id',  $id)->update($profile);
        return redirect()->route('student.profile.show')->with('success', 'Successfully updated profile.');
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
