<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use App\User;
use App\Book;
class LibrarianController extends Controller
{
 public function __construct()
    { 
        $this->middleware('role:superadministrator');
    }
    public function index()
    {
        $authorizedRoles = ['librarian'];
        $roles = Role::all();
        $users = User::whereHas('roles', static function ($query) use ($authorizedRoles) {
                    return $query->whereIn('name', $authorizedRoles);
                })->where('approved', '=', 1)->get();
        return view('admin.listoflibrarian', ['users' => $users,'roles'=> $roles ]);
    }

    public function delete_user($user_id)
    {
        User::where ('id',  $user_id)->delete();
        return back()->with('success', 'Successfully deleted user.');
    }

    public function viewuser_prof(int $userId, Request $request){
        $user = User::findOrFail($userId);
        $myuploadbooks = Book::where('book_uploader', $user->name)->get();
        return view('admin.viewlibrarian', compact('user','myuploadbooks'));
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
        return back()->with('success', 'Successfully updated user.');
    }
}
