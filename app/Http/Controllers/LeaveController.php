<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lib;
use App\Dep;
use App\Leave;
use DateTime;
use Carbon\Carbon;
use Session;
use DB;

class LeaveController extends Controller
{
    public function __construct()
    {
        //All below Auth normal
        $this->middleware('auth');

        //Only Function
        //$this->middleware('auth',['only' => ['index','form'] ]);

        //Except Function
        //$this->middleware('auth',['except' => ['index'] ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aCss=array('css/leave/style.css');
        $aScript=array('js/leave/main.js'); 
        $dep = DB::table('deps')
            ->select('deps.*')
            ->get();
        $result = json_decode($dep, true); 
        $data = array(
            'dep' => $result,
            'style' => $aCss,
            'script'=> $aScript,
        );
         return view('leave.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCss=array('css/leave/style.css');
        $aScript=array('js/leave/main.js');
        $lib = DB::table('libs')
            ->select('surname', 'nickname','id')
            ->get();
        $result = json_decode($lib, true); 
        $data = array(
            'lib' => $result,
            'style' => $aCss,
            'script'=> $aScript,
        );
        return view('leave.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge([ 
            'proof_leave' => implode(',', (array) $request->get('proof_leave'))
        ]);
        
        dd($request->merge);

        $this->validate($request,[
            'id_per' => 'required|max:100',
            'type_leave' => 'required|max:100',
            'date_leave' => 'required|max:100',
            'dstart_leave' => 'required|max:100',
            'dend_leave' => 'required|max:100',
            'approved' => 'required|max:100'           
        ]);
    
        
        $now = new Carbon();
        $dep = new Dep;        

        $dep->name_dep = $requestdep->name_dep;

        $dep->created_at = $now;
        
        $dep->save();
        return redirect('leave');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aCss=array('css/leave/style.css');
        $dep = DB::table('deps')
            ->select('deps.*')
            ->where('id_dep','=',$id)
            ->get();
        $result = json_decode($dep, true); 
        $data = array(
            'dep' => $result,
            'style' => $aCss
        );
         return view('leave.show',$data);
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
            $aCss=array('css/leave/style.css');       
            $dep = DB::table('deps')
                ->select('deps.*')
                ->where('id_dep','=',$id)
                ->get();
            $result = json_decode($dep, true);
            $data = array(
                'dep' => $result,
                'style' => $aCss
            );
            return view('leave.from',$data);
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
          'name_dep' => 'required|max:100'
        ]);
        $now = new Carbon();
        $depUpdate = Dep::where('id_dep',$id)
        ->update([
            'name_dep' => $request->input('name_dep'),
            'updated_at' => $now,
        ]);

        if($depUpdate){
            Session::flash('masupdate','แก้ไขข้อมูลฝ่ายเรียบร้อยแล้ว');
            return redirect('leave');
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
        $depDelete = Dep::where('id_dep',$id)
            ->delete();

        if($depDelete){
            Session::flash('masdelete','ลบข้อมูลฝ่ายเรียบร้อยแล้ว');
            return redirect('leave');
        }
    }
}
