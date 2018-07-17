<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Lib;
use App\Dep;
use DateTime;
use Carbon\Carbon;
use Session;

class DepController extends Controller
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
        $aCss=array('css/dep/style.css');
        $aScript=array('js/dep/main.js'); 
        $dep = DB::table('dep')
            ->select('dep.*')
            ->get();
        $result = json_decode($dep, true); 
        $data = array(
            'dep' => $result,
            'style' => $aCss,
            'script'=> $aScript,
        );
         return view('dep.index',$data);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCss=array('css/dep/style.css');
        $data = array(
            'style' => $aCss,
        );
        return view('dep.add',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $requestdep)
    {
        $this->validate($requestdep,[
            'name_dep' => 'required|max:100'
        ]);
        $now = new Carbon();
        $dep = new Dep;        

        $dep->name_dep = $requestdep->name_dep;
        $dep->created_at = $now;
        $dep->save();

        return redirect('dep');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aCss=array('css/dep/style.css');
        $dep = DB::table('dep')
            ->select('dep.*')
            ->where('id_dep','=',$id)
            ->get();
        $result = json_decode($dep, true); 
        $data = array(
            'dep' => $result,
            'style' => $aCss
        );
         return view('dep.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($ib)
    {   
        if($ib !== ''){
            $aCss=array('css/dep/style.css');       
            $dep = DB::table('dep')
                ->select('dep.*')
                ->where('id_dep','=',$ib)
                ->get();
            $result = json_decode($dep, true);
            $data = array(
                'dep' => $result,
                'style' => $aCss
            );
            return view('dep.from',$data);
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
            return redirect('dep');
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
        //$dep = Dep::find($id);
        $depDelete = Dep::where('id_dep',$id)
            ->delete();

        if($depDelete){
            Session::flash('masdelete','ลบข้อมูลฝ่ายเรียบร้อยแล้ว');
            return redirect('dep');
        }
    }
}
