<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('libs.*', 'pos.name_pos','deps.name_dep')
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
        $pos = DB::table('deps')
            ->join('pos', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('pos.*', 'name_dep')
            ->get();
        $result = json_decode($pos, true);    
        $data = array(
            'style' => $aCss,
            'pos' => $result,
        );
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
            'surname' => 'required|max:100',
            'age' => 'required|max:100',
            'position' => 'required|max:100',
            'job_start' => 'required|max:100',
            'user_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'phone' => 'required|regex:/[0-9]/',
        ]);
        $now = new Carbon();
        $lib = new Lib;


         //dd($request->all());

        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
        $request->user_photo->move(public_path('images'), $photoName);

        $lib->id_employ = $request->id_employ;
        $lib->surname = $request->surname;
        $lib->nickname = $request->nickname;                
        $lib->job_start = $request->job_start;
        $lib->age = $request->age;
        $lib->position = $request->position;
        $lib->created_at = $now;
        $lib->y_work = 99;
        $lib->job_end = $now;
        $lib->user_photo = $photoName;
        $lib->education = $request->education;
        $lib->n_education = $request->n_education;
        $lib->phone = $request->phone;
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
            ->join('deps', 'deps.id_dep', '=', 'pos.id_dep')
            ->select('libs.*', 'pos.name_pos','deps.name_dep')
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
                'lib' => $result1,
                'pos' => $result2,
                'style' => $aCss,
            );     
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
            'surname' => 'required|max:100',
            'nickname' => 'required|max:100',
            'id_pos' => 'required|max:100',
            'job_start' => 'required|max:100',
            'age' => 'required|max:100'
      ]);

      if ($request->hasFile('user_photo')){
        $photoName = time().'.'.$request->user_photo->getClientOriginalExtension();
        $request->user_photo->move(public_path('images'), $photoName);
        File::delete(public_path('images/'.$request->user_photoOld));
      }else{
        if($request->user_photoOld==''){
          $photoName = '0000000000.jpg';
        }else{
          $photoName =$request->user_photoOld;
        //dd($photoName);
        }
        
      }

      $now = new Carbon();
      $libsUpdate = Lib::where('id',$id)
      ->update([
          'surname' => $request->input('surname'),
          'nickname' => $request->input('nickname'),
          'age' => $request->input('age'),
          'updated_at' => $now,
          'id_employ' => $request->input('id_employ'),
          'job_start' => $request->input('job_start'),
          'position' => $request->input('id_pos'),
          'user_photo' => $photoName,
          'education' => $request->education,
          'n_education' => $request->n_education,
          'phone' => $request->phone,
      ]);

      if($libsUpdate){
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
        File::delete(public_path('images/'.$lib->user_photo));
        $libDelete = Lib::where('id',$request->depId)
            ->delete();        

        if($libDelete){
            Session::flash('masdelete','ลบข้อมูลตำแหน่งเรียบร้อยแล้ว');
            return redirect('lib');
        }
    }
}
