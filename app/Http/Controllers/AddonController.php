<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Leave;
use App\Lib;
use Carbon\Carbon;

class AddonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function graph()
    {
        $now = new Carbon();

        $pos = DB::table('pos')
            ->join('deps', 'pos.id_dep', '=', 'deps.id_dep')
            ->join('libs', 'libs.position', '=', 'pos.id_pos')
            ->selectRaw("deps.id_dep,deps.name_dep,count(libs.id) as count_person")
            ->groupBy(DB::raw("deps.id_dep"))
            ->get();

        $barcharthorizontal = DB::table('libs')
            ->selectRaw("libs.id,libs.surname,libs.nickname,TIMESTAMPDIFF(YEAR, libs.age, CURDATE()) AS age")
            ->groupBy(DB::raw("age"))
            ->get();
        
        $piechart = DB::table('libs')
            ->selectRaw("COUNT(surname) AS woman,(SELECT COUNT(surname) FROM libs WHERE surname LIKE ('นาย%')) AS man")
            ->whereRaw("surname LIKE ('นาง%')")
            ->get();
            
        DB::statement('SET GLOBAL group_concat_max_len = 1000000');
        $wordcloud = Leave::selectRaw("GROUP_CONCAT(reason_leave) as text")
            ->whereRaw("reason_leave != '' ")
            ->get();
        // $wordcloud = Leave::selectRaw("reason_leave")
        //     ->whereRaw("reason_leave != '' ")
        //     ->get();

        $piechart2 = Lib::selectRaw("libs.position, pos.name_pos, COUNT(libs.id) as person")
            ->join('pos', 'pos.id_pos', '=', 'libs.position')
            ->groupBy(DB::raw("libs.position"))
            ->get();        

        $barchart2 = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->selectRaw("id_per,type_leave,COUNT(leaves.nstart_day) counts,libs.surname")
            ->whereRaw("leaves.nstart_day = $now->year")
            ->groupBy(DB::raw("leaves.id_per,type_leave"))
            ->get();

        $result = json_decode($pos, true);
        $result1 = json_decode($barcharthorizontal, true);
        $result2 = json_decode($piechart, true);
        $result3 = json_decode($wordcloud, true);
        $result4 = json_decode($piechart2, true);
        $result6 = json_decode($barchart2, true);

        $data = array(
            'pos' => $result,
            'thorizontal' => $result1,
            'piechart' => $result2,
            'wordcloud' => $result3,
            'piechart2' => $result4,
            'barchart2' => $result6,
        );
        //dd($data);
        return view('addon.graph',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function organiz()
    {   
        $aCss=array('css/addon/style.css');
        $data = array(
            'style' => $aCss
        );
        return view('addon.organiz',$data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function chat()
    {   
        $aCss=array('css/addon/style.css');
        $data = array(
            'style' => $aCss
        );
        return view('addon.chat',$data);
    }

    public function gallery()
    {
        $aCss=array('css/addon/style.css');
        $lib = Lib::all();
        $result = json_decode($lib, true);
        $data = array(
            'lib' => $result,
            'style' => $aCss
        );
        return view('addon.gallery',$data);
    }

    public function calendar()
    {
        $aCss=array('css/addon/style.css');
        $lib = Lib::all();
        $result = json_decode($lib, true);
        $data = array(
            'lib' => $result,
            'style' => $aCss
        );
        return view('addon.calendar',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
