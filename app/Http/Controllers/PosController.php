<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use App\Lib;
use App\Dep;
use App\Pos;
use DateTime;
use Carbon\Carbon;
use Session;
use DB;
class PosController extends Controller
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
        $aCss=array('css/pos/style.css');
        $aScript=array('js/pos/main.js'); 
        $pos = DB::table('pos')
            ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('pos.*','name_dep')
            ->get();

        $lib = DB::table('libs')
             ->select(DB::raw('count(position) as count_id, position'))
             ->groupBy('position')
             ->get();

        $result = json_decode($pos, true); 
        $result2 = json_decode($lib, true);
        $data = array(
            'pos' => $result,
            'lib' => $result2,
            'style' => $aCss,
            'script'=> $aScript,
        );
        Log::info('index ข้อมูล pos.index โดย '.Auth::user()->name);
        return view('pos.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCss=array('css/pos/style.css');
        $dep = DB::table('deps')
            ->select('deps.*')
            ->get();
        $result = json_decode($dep, true);
        $data = array(
            'style' => $aCss,
            'dep' => $result,
        );
        Log::info('create ข้อมูล pos.add โดย '.Auth::user()->name);
        return view('pos.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name_dep' => 'required|max:100',
            'name_pos' => 'required|max:100',
        ]);
        $now = new Carbon();
        DB::table('pos')
            ->insert([
            'name_pos'  => $request->name_pos,
            'id_dep'    => $request->name_dep, 
            'created_at'=> $now,
        ]);
        Log::info('store ข้อมูล pos โดย '.Auth::user()->name);
        return redirect('pos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aCss=array('css/pos/style.css');
        $pos = DB::table('pos')
            ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('pos.*','name_dep')
            ->where('id_pos','=',$id)
            ->get();

        $lib = DB::table('libs')
             ->select(DB::raw('count(position) as count_id, position'))
             ->where('position',$id)
             ->groupBy('position')
             ->get();

        $result = json_decode($pos, true); 
        $result2 = json_decode($lib, true);
        $data = array(
            'pos' => $result,
            'lib' => $result2,
            'style' => $aCss
        );
        Log::info('show ข้อมูล pos.show โดย '.Auth::user()->name);
        return view('pos.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if($id !== ''){
            $aCss=array('css/pos/style.css');
            $dep = DB::table('deps')->get();       
            $pos = DB::table('pos')
                ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
                ->select('pos.*','name_dep')
                ->where('id_pos','=',$id)
                ->get();
            $result = json_decode($pos, true);
            $result2 = json_decode($dep, true);
            $data = array(
                'pos' => $result,
                'style' => $aCss,
                'dep' => $result2,
            );
            Log::info('edit ข้อมูล pos.from โดย '.Auth::user()->name);
            return view('pos.from',$data);
        }
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
        $this->validate($request,[
          'name_pos' => 'required|max:100',
          'id_dep' => 'required|max:100'
        ]);

        $now = new Carbon();
        $posUpdate = DB::table('pos')
            ->where('id_pos', $id)
            ->update([
                'name_pos'  => $request->input('name_pos'),
                'id_dep'    => $request->input('id_dep'),
                'updated_at'=> $now,
                ]);
        if($posUpdate){
            Log::info('update ข้อมูล pos โดย '.Auth::user()->name);
            Session::flash('masupdate','แก้ไขข้อมูลตำแหน่งเรียบร้อยแล้ว');
            return redirect('pos');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $posDelete = DB::table('pos')
            ->where('id_pos', '=', $request->depId)
            ->delete();

        if($posDelete){
            Log::info('destroy ข้อมูล pos โดย '.Auth::user()->name);
            Session::flash('masdelete','ลบข้อมูลตำแหน่งเรียบร้อยแล้ว');
            return redirect('pos');
        }
    }
}
