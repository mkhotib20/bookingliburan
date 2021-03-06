<?php

namespace App\Http\Controllers\Auth;

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

    use AuthenticatesUsers {
        redirectPath as laravelRedirectPath;
        showLoginForm as laravelShowLoginForm;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function showLoginForm()
    {
        return back();
    }
    protected $redirectTo = '/';
    public function redirectPath()
    {
        // Do your logic to flash data to session...
        session()->flash('msg', 'Welcome to bookingliburan.com');
        // Return the results of the method we are overriding that we aliased.
        // return $this->laravelRedirectPath();
        return '/'.app()->getLocale();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        // $this->middleware('guest:auth_admin')->except('logout');
        // $this->middleware('guest:auth_customer')->except('logout');
    }
}
