<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    public function isLogged(){
        if (Auth::check()) {
            return redirect ('home');
        }

        return view('auth.login');
    }

    public function authentication(Request $request){

        $this -> validate($request, [
            'user'=>'required',
            'password'=>'required',
        ]);
        $user = $request->input('user');
        $password = $request->input('password');
        $loginData = ['user' => $user, 'password' => $password];
        if (auth::attempt($loginData)){
            return redirect ('home');
        }
        else {
            return redirect ('/');
        }
        
    }

    public function logout(Request $request){
        $request->session()->flush();
        Auth::logout();
        return redirect ('login');
    }
    
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
