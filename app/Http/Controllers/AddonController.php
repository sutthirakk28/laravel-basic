<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib;

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
    public function show($id)
    {
        //
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
