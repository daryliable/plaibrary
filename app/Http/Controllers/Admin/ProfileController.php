<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\User;
use App\Profile;
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

    public function update(Request $request){

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        $rules = [
            'name' => '',
            'gender' => '',
            'civil' => '',
            'birthdate' => '',
            'address' => '',
            'contact_num' => '',
            'designation' => '',
            'occupation' => '',
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
                'designation' => $request->designation,
                'occupation' => $request->occupation,
                'coll_univ' => $request->coll_univ,
        ];

        if ($request->has('profile') && $imageName) {
            $profile['image_url'] = $imageName;
         }
      
        $user->save();
        $editProfileupdate = Profile::where ('id',  $id)->update($profile);
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
