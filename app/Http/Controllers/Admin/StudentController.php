<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\View;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\User;
use App\Role;
use App\Reservation;
class StudentController extends Controller
{ 
     public function __construct()
    { 
        $this->middleware('role:superadministrator');
    }
    public function index()
    {
        $authorizedRoles = ['student'];
        $roles = Role::all();
        $users = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
                    return $query->whereIn('name', $authorizedRoles);
                })->where('approved', '=', 1)->get();
        return view('admin.usermanagement', ['users' => $users,'roles'=> $roles ]);
    }

    
    public function delete_user($user_id)
    {
        User::where ('id',  $user_id)->delete();
        return back()->with('success', 'Successfully deleted user.');
    }

    public function viewuser_prof(int $userId, Request $request){
        $user = User::findOrFail($userId);
        $myborrowbooks = Reservation::where('student_name', $user->name)->where('status', '=', 2)->get();
        return view('admin.viewstudent', compact('user', 'myborrowbooks'));
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
        return redirect("/user/$user->id")->with('success', 'Successfully updated user.');
    }
}
