<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        
    //     $this->middleware('guest')->except('logout');
    //     return redirect('/hello');
    // }
    protected function authenticated()
    {
        $user = auth()->user();
        $user->active = 1;
        $user->save();
    }
    protected function logout()
    {
        $user = auth()->user();
        $user->active = 0;
        $user->save();
        $this->middleware('guest')->except('logout');
        
        return redirect('/');
    }
    // public function form1()
    // {
    //     return 'wellcome to from';
    // }
    // public function poll(){
    //     return "wellcom to poll";
    // }
}
