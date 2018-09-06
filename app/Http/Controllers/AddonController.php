<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
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

        $result = json_decode($pos, true);
        $result1 = json_decode($barcharthorizontal, true);

        $data = array(
            'pos' => $result,
            'thorizontal' => $result1,
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
