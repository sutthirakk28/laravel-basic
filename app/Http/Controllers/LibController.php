<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Session;
use Cookie;
use App\Lib;
use App\Dep;
use App\Pos;
use DateTime;
use Carbon\Carbon;
use DB;
use File;

class LibController extends Controller
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
      $aCss=array('css/lib/style.css');
      $aScript=array('js/lib/main.js'); 
      $lib = DB::table('libs')
        ->join('pos', 'libs.position', '=', 'pos.id_pos')
        ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
        ->select('libs.*', 'pos.name_pos','deps.name_dep')
        ->get();

      $result = json_decode($lib, true); 
      $data   = array(
        'lib'   => $result,
        'style' => $aCss,
        'script'=> $aScript,
      );
      Log::info('index ข้อมูล lib.index โดย '.Auth::user()->name);
      return view('lib.index',$data);        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $aCss = array('css/lib/style.css');
      $pos  = DB::table('deps')
        ->join('pos', 'deps.id_dep', '=', 'pos.id_dep')
        ->select('pos.*', 'name_dep')
        ->get();
      $result = json_decode($pos, true);    
      $data = array(
        'style' => $aCss,
        'pos'   => $result,
      );
      Log::info('create ข้อมูล lib.add โดย '.Auth::user()->name);
      return view('lib.add',$data);
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
        'surname'   => 'required|max:100',
        'age'       => 'required|date_format:Y-m-d',
        'position'  => 'required|max:100',
        'job_start' => 'required|date_format:Y-m-d',
        'user_photo'=> 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'phone'     => 'required|regex:/[0-9]/',
      ]);
      $now = new Carbon();
      $lib = new Lib;

      $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
      $request->user_photo->move('images', $photoName);

      $lib->id_employ = $request->id_employ;
      $lib->surname   = $request->surname;
      $lib->nickname  = $request->nickname;                
      $lib->job_start = $request->job_start;
      $lib->age = $request->age;
      $lib->position  = $request->position;
      $lib->created_at= $now;
      $lib->y_work    = 99;
      $lib->job_end   = $now;
      $lib->user_photo= $photoName;
      $lib->education = $request->education;
      $lib->n_education = $request->n_education;
      $lib->phone = $request->phone;
      $lib->save();

      Log::info('store ข้อมูล lib โดย '.Auth::user()->name);
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
        $lib = DB::table('libs')
          ->join('pos', 'libs.position', '=', 'pos.id_pos')
          ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
          ->select('libs.*', 'pos.name_pos','deps.name_dep')
          ->where('libs.id','=',$id)
          ->get();
        $result = json_decode($lib, true); 
        $data = array(
          'lib'   => $result,
          'style' => $aCss,
        );

        Log::info('show ข้อมูล lib.show โดย '.Auth::user()->name);
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
        $aCss=array('css/lib/style.css');
        if ($id !== '') {
          $lib = DB::table('libs')
          ->join('pos', 'libs.position', '=', 'pos.id_pos')
          ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
          ->select('libs.*', 'pos.name_pos','deps.name_dep')
          ->where('libs.id','=',$id)
          ->get();

          $pos = DB::table('deps')
          ->join('pos', 'deps.id_dep', '=', 'pos.id_dep')
          ->select('pos.*', 'name_dep')
          ->get();

          $result1 = json_decode($lib, true);
          $result2 = json_decode($pos, true);
          $data = array(
            'lib'   => $result1,
            'pos'   => $result2,
            'style' => $aCss,
          );
        Log::info('edit ข้อมูล lib.from โดย '.Auth::user()->name);     
        return view('lib.from',$data);
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
        'id_employ' => 'required|max:100',
        'surname'   => 'required|max:100',
        'nickname'  => 'required|max:100',
        'id_pos'    => 'required|max:100',
        'job_start' => 'required|date_format:Y-m-d',
        'age'       => 'required|date_format:Y-m-d'
      ]);

      if ($request->hasFile('user_photo')){
        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
        $request->user_photo->move('images', $photoName);
        File::delete('images/'.$request->user_photoOld);
      }else{
        if($request->user_photoOld==''){
          $photoName = '0000000000.jpg';
        }else{
          $photoName =$request->user_photoOld;
        }        
      }

      $now = new Carbon();
      $libsUpdate = Lib::where('id',$id)
      ->update([
        'surname'   => $request->input('surname'),
        'nickname'  => $request->input('nickname'),
        'age'       => $request->input('age'),
        'updated_at'=> $now,
        'id_employ' => $request->input('id_employ'),
        'job_start' => $request->input('job_start'),
        'position'  => $request->input('id_pos'),
        'user_photo'=> $photoName,
        'education' => $request->education,
        'n_education'=> $request->n_education,
        'phone'     => $request->phone,
      ]);

      if($libsUpdate){
        Log::info('update ข้อมูล lib โดย '.Auth::user()->name);
        Session::flash('masupdate','แก้ไขข้อมูลพนักงานเรียบร้อยแล้ว');
        return redirect('lib');
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
      $lib = Lib::find($request->depId);
      File::delete('images/'.$lib->user_photo);
      $libDelete = Lib::where('id',$request->depId)
        ->delete();        

      if($libDelete){
        Log::info('destroy ข้อมูล lib โดย '.Auth::user()->name);
        Session::flash('masdelete','ลบข้อมูลตำแหน่งเรียบร้อยแล้ว');
        return redirect('lib');
      }
    }
}
