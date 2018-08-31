<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Lib;
use App\Task;
use App\Leave;
use DB;

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
        $leave = DB::table('leaves')
            ->join('libs', 'leaves.id_per', '=', 'libs.id')
            ->select('leaves.id','leaves.nstart_day','leaves.nend_day','leaves.type_leave', 'libs.surname','libs.nickname')
            ->get();
        $result = json_decode($leave, true);
        $data = array(
            'leave' => $result,
        );
        return view('home', $data);
    }

    public function list_leave()
    {
        $leave = Leave::all();
        return response()->json(['leave'=>$leave]);
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
