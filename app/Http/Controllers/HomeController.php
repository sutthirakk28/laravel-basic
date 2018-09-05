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
        $now = new Carbon();

        $leave = DB::table('leaves')
            ->join('libs', 'leaves.id_per', '=', 'libs.id')
            ->select('leaves.id','leaves.nstart_day','leaves.nend_day','leaves.type_leave', 'libs.surname','libs.nickname')
            ->get();
        $ctl = DB::table('leaves')
            ->selectRaw('count(nstart_day) as count_leave, type_leave')
            ->whereRaw("leaves.nstart_day = $now->year")
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
            ->whereRaw("leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $piechart = DB::table('leaves')
            ->selectRaw("REPLACE(REPLACE(REPLACE(REPLACE(REPLACE(type_leave, '0', 'ลาบวชฯ') , '1', 'ลาคลอด') , '2', 'ลาป่วย'), '3', 'ลากิจ'), '4', 'พักร้อน') AS type_leave,COUNT(nstart_day) AS count_leave ")
            ->whereRaw("leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("type_leave"))
            ->get();
        $max_min = DB::table('leaves')
            ->selectRaw("DATE_FORMAT(max(nstart_day),'%m') as max,DATE_FORMAT(min(nstart_day),'%m') as min")
            ->whereRaw("leaves.nstart_day = $now->year")
            ->get();
        $barchartgrouped = DB::table('leaves')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months ")
            ->whereRaw("leaves.type_leave = 0 AND leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $barchartgrouped1 = DB::table('leaves')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months ")
            ->whereRaw("leaves.type_leave = 1 AND leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $barchartgrouped2 = DB::table('leaves')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months ")
            ->whereRaw("leaves.type_leave = 2 AND leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $barchartgrouped3 = DB::table('leaves')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months ")
            ->whereRaw("leaves.type_leave = 3 AND leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $barchartgrouped4 = DB::table('leaves')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months ")
            ->whereRaw("leaves.type_leave = 4 AND leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("type_leave,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $linechart = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->selectRaw("type_leave,COUNT(nstart_day) AS count_leave,DATE_FORMAT(nstart_day,'%m') AS months,leaves.id_per, libs.surname")
            ->whereRaw("leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("id_per,DATE_FORMAT(nstart_day,'%Y-%m')"))
            ->get();
        $result = json_decode($leave, true);
        $result2 = json_decode($ctl, true);
        $result3 = json_decode($ctl_month, true);
        $result4 = json_decode($ctl_month2, true);
        $result5 = json_decode($barchart, true);
        $result6 = json_decode($piechart, true);
        $result7 = json_decode($max_min, true);
        $result8 = json_decode($barchartgrouped, true);
        $result9 = json_decode($barchartgrouped1, true);
        $result10 = json_decode($barchartgrouped2, true);
        $result11 = json_decode($barchartgrouped3, true);
        $result12 = json_decode($barchartgrouped4, true);
        $result13 = json_decode($linechart, true);
        $data = array(
            'leave' => $result,
            'ctl' => $result2,
            'ctl_month' => $result3,
            'ctl_month2' => $result4,
            'barchart' => $result5,
            'piechart' => $result6,
            'max_min' => $result7,
            'barchartgrouped' => $result8,
            'barchartgrouped1' => $result9,
            'barchartgrouped2' => $result10,
            'barchartgrouped3' => $result11,
            'barchartgrouped4' => $result12,
            'linechart' => $result13,
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
