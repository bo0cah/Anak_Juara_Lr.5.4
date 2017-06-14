<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;  //Guard library
use Illuminate\Foundation\Auth\ThrottlesLogins;  //user will not be able to login for one minute if they fail to provide the correct credentials after several attempts

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
    protected $redirectTo = '/';
    protected $redirectAfterLogout = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // By default, Laravel uses the email field for authentication.
    // If you would like to customize this, you may define a username
    
    // public function username()
    // {
    //     return 'username';
    // }

    // You may also customize the "guard" that is used to authenticate and register users.
    // To get started, define a guard method on your LoginController, RegisterController, and
    // ResetPasswordController. The method should return a guard instance:
    
    // protected function guard()
    // {
    //     return Auth::guard('guard-name');
    // }
}
