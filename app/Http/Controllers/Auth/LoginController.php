<?php

namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function authenticated(Request $request, $user){
        
           $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
             ]);
            
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    if($user->hasRole('superadministrator')){   
                        return redirect()->intended(route('superadmin.dashboard'));
                    }
                }   
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    if($user->hasRole('librarian')){    
                        return redirect()->intended(route('librarian.dashboard'));
                    }
                }
            if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
                    if($user->hasRole('student')){   
                        return redirect()->intended(route('student.dashboard'));
                    }
                }
           
    }
    /**
     * Create a new control ler instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
