<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;
use App\User;
use App\Lib;
use App\Task;
use App\Leave;
use DB;
use Carbon\Carbon;

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
        $ctl = DB::table('leaves')
            ->selectRaw('count(nstart_day) as count_leave, type_leave')
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $ctl_month = DB::table('leaves')
            ->selectRaw("count(nstart_day) as count_leave, type_leave, DATE_FORMAT(nstart_day,'%M') as months")
            ->whereRaw('extract(month from nstart_day) = ?', [Carbon::today()->month])
            ->groupBy(DB::raw("type_leave"))
            ->get();
        $ctl_month2 = DB::table('leaves')
            ->selectRaw("count(nstart_day) as count_leave, type_leave, DATE_FORMAT(nstart_day,'%M') as months")
            ->whereRaw('extract(month from nstart_day) = ?', [Carbon::today()->month-1])
            ->groupBy(DB::raw("type_leave"))
            ->get();
        $barchart = DB::table('leaves')
            ->selectRaw("DATE_FORMAT(nstart_day,'%M') as months,count(nstart_day) as count_leave")
            ->groupBy(DB::raw("DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $piechart = DB::table('leaves')
            ->selectRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(type_leave, '0', 'ลาบวชฯ') , '1', 'ลาคลอด') , '2', 'ลาป่วย'), '3', 'ลากิจ'), '4', 'พักร้อน') AS type_leave,COUNT(nstart_day) AS count_leave ")
            ->groupBy(DB::raw("type_leave"))
            ->get();
        $max_min = DB::table('leaves')
            ->selectRaw("DATE_FORMAT(max(nstart_day),'%m') as max,DATE_FORMAT(min(nstart_day),'%m') as min")
            ->get();
        $barchartgrouped = DB::table('leaves')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months ")
            ->WHERE('leaves.type_leave','=',0)
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $result = json_decode($leave, true);
        $result2 = json_decode($ctl, true);
        $result3 = json_decode($ctl_month, true);
        $result4 = json_decode($ctl_month2, true);
        $result5 = json_decode($barchart, true);
        $result6 = json_decode($piechart, true);
        $result7 = json_decode($max_min, true);
        $result8 = json_decode($barchartgrouped, true);
        $data = array(
            'leave' => $result,
            'ctl' => $result2,
            'ctl_month' => $result3,
            'ctl_month2' => $result4,
            'barchart' => $result5,
            'piechart' => $result6,
            'max_min' => $result7,
            'barchartgrouped' => $result8,
        );
        //dd($data);
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
