<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Cookie;
use App\Lib;
use App\dep;
use App\pos;
use DateTime;
use Carbon\Carbon;
use DB;

class LibController extends Controller
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
        $aCss=array('css/lib/style.css');
        $aScript=array('js/lib/main.js');              

        //$lib =Lib::all();
        $lib = DB::table('libs')
            ->join('pos', 'libs.position', '=', 'pos.id_pos')
            ->join('dep', 'dep.id_dep', '=', 'pos.id_dep')
            ->select('libs.*', 'pos.name_pos','dep.name_dep')
            ->get();
        
        //Session::put('language','Thai');
        //Session(['english' => 'good','japanese' => 'poor']);
        //Session::forget('japanese');
        //Session::flush();

        //Cookie::queue('name','value','minutes'); ตัวอย่าวงรูปแบบการสร้าง Cookie
        //Cookie::queue('language','thai',1);
        //Cookie::queue(Cookie::forever('name','sutthirak'));
        $result = json_decode($lib, true); 
        $data = array(
            'lib' => $result,
            'style' => $aCss,
            'script'=> $aScript,
        );
         return view('lib.index',$data);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCss=array('css/lib/style.css');
        $data = array(
            'style' => $aCss
        );
        return view('lib.from',$data);

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
            'id_employ' => 'required|max:100',
            'surname' => 'required|max:100'
        ]);
        $now = new Carbon();
        $lib = new Lib;        

        $lib->id_employ = $request->id_employ;
        $lib->surname = $request->surname;
        $lib->nickname = $request->nickname;                
        $lib->job_start = $request->job_start;
        $lib->age = $request->age;
        $lib->position = $request->position;
        $lib->created_at = $now;
        $lib->y_work = 99;
        $lib->job_end = $now;        

        $lib->save();

        return redirect('lib');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aCss=array('css/lib/style.css');
        //$lib = Lib::find($id);
        $lib = DB::table('libs')
            ->join('pos', 'libs.position', '=', 'pos.id_pos')
            ->join('dep', 'dep.id_dep', '=', 'pos.id_dep')
            ->select('libs.*', 'pos.name_pos','dep.name_dep')
            ->where('libs.id','=',$id)
            ->get();
        $result = json_decode($lib, true); 
        $data = array(
            'lib' => $result,
            'style' => $aCss,
        );
         return view('lib.show',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      if ($id !== '') {
          $lib = Lib::find($id);
          $data = array(
            'lib' => $lib
          );
          return view('lib/from',$data);
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
          'title' => 'required|max:100',
          'language' => 'required|max:100',
          'star' => 'required|numeric'
      ]);

      $lib = Lib::find($id);
      $lib->title = $request->title;
      $lib->language = $request->language;
      $lib->star = $request->star;
      $lib->save();

      Session::flash('massage','Success Update Lib');
      return redirect('lib');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lib = Lib::find($id);
        $lib->delete();
        Session::flash('message','Success Delete Lib');
        return redirect('lib');
    }
}
