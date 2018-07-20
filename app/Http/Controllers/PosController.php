<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        $result = json_decode($pos, true); 
        $data = array(
            'pos' => $result,
            'style' => $aCss,
            'script'=> $aScript,
        );
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
        $dep = Dep::all();
        $data = array(
            'style' => $aCss,
            'dep' => $dep,
        );
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
        $pos = new Pos;        

        $pos->name_pos = $request->name_pos;
        $pos->id_dep = $request->name_dep;
        $pos->created_at = $now;
        $pos->save();
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
        $result = json_decode($pos, true); 
        $data = array(
            'pos' => $result,
            'style' => $aCss
        );
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
            $dep = Dep::all();       
            $pos = DB::table('pos')
                ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
                ->select('pos.*','name_dep')
                ->where('id_pos','=',$id)
                ->get();
            $result = json_decode($pos, true);
            $data = array(
                'pos' => $result,
                'style' => $aCss,
                'dep' => $dep,
            );
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
        $posUpdate = Pos::where('id_pos',$id)
        ->update([
            'name_pos' => $request->input('name_pos'),
            'id_dep' => $request->input('id_dep'),
            'updated_at' => $now,
        ]);

        if($posUpdate){
            Session::flash('masupdate','แก้ไขข้อมูลตำแหน่งเรียบร้อยแล้ว');
            return redirect('pos');
            // return redirect('dep')
            // ->with('success', 'แก้ไขข้อมูลฝ่ายเรียบร้อยแล้ว');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posDelete = Pos::where('id_pos',$id)
            ->delete();

        if($posDelete){
            Session::flash('masdelete','ลบข้อมูลตำแหน่งเรียบร้อยแล้ว');
            return redirect('pos');
        }
    }
}
