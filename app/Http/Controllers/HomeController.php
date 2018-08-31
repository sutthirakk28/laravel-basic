<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Lib;
use App\Task;
use App\Leave;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function sum_leave()
    {
        $sum_leave = Leave::count('id');
        return response()->json(['sum_leave'=>$sum_leave]);
    }

    public function sum_admin()
    {
        $sum_admin = User::count('id');
        return response()->json(['sum_admin'=>$sum_admin]);
    }

    public function sum_per()
    {
        $sum_per = Lib::count('id');
        return response()->json(['sum_per'=>$sum_per]);
    }

    public function sum_task()
    {
        $sum_task = Task::count('id');
        return response()->json(['sum_task'=>$sum_task]);
    }
    
}
