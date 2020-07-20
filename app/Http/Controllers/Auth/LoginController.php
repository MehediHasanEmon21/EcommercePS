<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class LoginController extends Controller
{
   

    public function login(Request $request){

        $email = $request->email;
        $password = $request->password;

        $validData = User::where('email',$request->email)->first();
        $passwor_check = password_verify($password,$validData->password);
        if ( $passwor_check== false) {
            return back()->with('error','Email or password does not match');
        }
        if (@$validData->status == 0) {
            return back()->with('error','Sorry!! your account not verified yet');
        }

        if (Auth::attempt(['email'=>$email,'password' => $password])) {
            return redirect()->route('login');
        }
        


    }

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
