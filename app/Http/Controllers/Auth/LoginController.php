<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


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
    protected function authenticated()
    {
        $user = auth()->user();
        $user->active = 1;
        $user->save();
        Log::notice('Login โดย '.Auth::user()->name);
    }
    protected function logout()
    {

        $user = auth()->user();
        $user->active = 0;
        $user->save();
        Log::notice('Logout โดย '.Auth::user()->name);
        $this->middleware('guest')->except('logout');        
        return redirect('/');
    }
}
