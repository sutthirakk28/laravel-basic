<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Lib;
use App\Dep;
use App\Leave;
use DateTime;
use Carbon\Carbon;
use Session;
use DB;
use Response;

use App\Leaves;
use App\Libss;
use App\Position;
use App\Department;
class LeaveController extends Controller
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
        $aCss=array('css/leave/style.css');
        $aScript=array('js/leave/main.js');
        $leave = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->select('leaves.*', 'libs.surname','libs.nickname','libs.user_photo','libs.id as lib_id','libs.job_start')
            ->orderBy('leaves.date_leave', 'DESC')
            ->get();
        
        $result = json_decode($leave, true);        
        $data = array(
            'leave' => $result,            
            'style' => $aCss,
            'script'=> $aScript,
        );
        Log::info('index ข้อมูล leave.index โดย '.Auth::user()->name);
        return view('leave.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCss   = array('css/leave/style.css');
        $aScript= array('js/leave/main.js');
        $lib = DB::table('libs')
            ->select('surname', 'nickname','id')
            ->get();
        $now = Carbon::today()->toDateString();
        $result = json_decode($lib, true);
        $data = array(
            'lib'   => $result,
            'style' => $aCss,
            'script'=> $aScript,
            'now1'  => $now,
        );
        Log::info('create ข้อมูล leave.add โดย '.Auth::user()->name);
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

        $this->validate($request,[
            'id_per'     => 'required|max:100',
            'type_leave' => 'required|max:100',
            'date_leave' => 'required|date_format:Y-m-d',
            'nstart_day' => 'required|max:100',
            'nend_day'   => 'required|max:100',
            'approved'   => 'required|max:100'
        ]);
        $now  = new Carbon();
        $now1 = Carbon::today()->toDateString();

        if(isset($request->proof_leave)){
          $checkBox = implode(',', $request->proof_leave);
        }else{
            $checkBox ='';
        }

        $leave = new Leave;
        $leave->id_per     = $request->id_per;
        $leave->type_leave = $request->type_leave;
        $leave->date_leave = $request->date_leave;
        $leave->reason_leave = $request->reason_leave;
        $leave->dstart_leave = $now1;
        $leave->dend_leave = $now1;
        $leave->nstart_day = $request->nstart_day;
        $leave->nend_day   = $request->nend_day;
        $leave->proof_leave= $checkBox;
        $leave->approved   = $request->approved;
        $leave->status_leave = $request->status_leave;
        $leave->created_at = $now;
        $leave->save();

        Log::info('store ข้อมูล leave โดย '.Auth::user()->name);
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
        $aCss = array('css/leave/style.css');
        $aScript = array('js/leave/main.js'); 
        $leave = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->select('leaves.*', 'libs.surname','libs.nickname','libs.user_photo','libs.id as lib_id','libs.job_start')
            ->orderBy('leaves.date_leave', 'DESC')
            ->where('leaves.id','=',$id)
            ->get();
        
        $result = json_decode($leave, true);        
        $data = array(
            'leave' => $result,            
            'style' => $aCss,
            'script'=> $aScript,
        );
        Log::info('show ข้อมูล leave.show โดย '.Auth::user()->name);
        return view('leave.show',$data);
    }

    public function report($id)
    {
        $aCss   = array('css/leave/style.css');
        $aScript= array('js/leave/main.js'); 
        $lib    = DB::table('leaves')
            ->join('libs', 'libs.id', '=', 'leaves.id_per')
            ->select('leaves.*','libs.surname','libs.nickname','libs.job_start')
            ->where('leaves.id_per','=',$id)
            ->orderBy('leaves.nstart_day', 'ASC')
            ->get();        
        $lib2   = DB::table('libs')->select('id','surname','nickname  as i','job_start')->where('id', $id)->first();
        $result = json_decode($lib, true); 
        $result2= json_decode(json_encode($lib2),true);
        $data = array(
            'lib'   => $result,
            'tuy'   => $result2,            
            'style' => $aCss,
            'script'=> $aScript,
        );
        Log::info('report ข้อมูล leave.report โดย '.Auth::user()->name);
        return view('leave.report',$data);
    }
        
    public function getFormScore()
    {     
        $IDs = lib::select('id','surname')->get();
        return view('ajax.score',compact('IDs'));
    }
    public function getDataScore(Request $request)
    {
        if($request->ajax())
        {            
            $student = Leave::where('id_per', '=', $request->studentid)
                ->select('id_per','type_leave','nstart_day','nend_day')
                ->orderBy('type_leave', 'asc')
                ->take(100)
                ->get();
            $result  = json_decode($student, true);  
            $response= array(
                'leave' => $result
            );
            Log::info('getDataScore ข้อมูล leave โดย '.Auth::user()->name);
            return response()->json($response);

        }
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
            $aCss    = array('css/leave/style.css');
            $aScript = array('js/leave/main.js');
            $leave   = DB::table('leaves')
                ->join('libs', 'libs.id', '=', 'leaves.id_per')
                ->select('leaves.*', 'libs.surname','libs.nickname','libs.user_photo')
                ->orderBy('leaves.date_leave', 'DESC')
                ->where('leaves.id','=',$id)
                ->get();
            $lib = DB::table('libs')
                ->select('id', 'surname','nickname')
                ->get();
            
            $result  = json_decode($leave, true);
            $result2 = json_decode($lib, true);
            $data    = array(
                'leave' => $result,
                'lib'   => $result2,
                'style' => $aCss,                
                'script'=> $aScript
            );
            Log::info('edit ข้อมูล leave.from โดย '.Auth::user()->name);
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
          'id_per'     => 'required|max:100',
          'type_leave' => 'required|max:100',
          'date_leave' => 'required|date_format:Y-m-d',
          'nstart_day' => 'required|max:100',
          'nend_day'   => 'required|max:100',
          'approved'   => 'required|max:100'
        ]);

        $now = new Carbon();
        $now1 = Carbon::today()->toDateString();

        if(isset($request->proof_leave)){
          $checkBox = implode(',', $request->proof_leave);
        }else{
            $checkBox ='';
        }

        $leaveUpdate = Leave::where('id',$id)
        ->update([
            'id_per'        => $request->id_per,
            'type_leave'    => $request->type_leave,
            'date_leave'    => $request->date_leave,
            'reason_leave'  => $request->reason_leave,
            'dstart_leave'  => $now1,
            'dend_leave'    => $now1,
            'nstart_day'    => $request->nstart_day,
            'nend_day'      => $request->nend_day,
            'proof_leave'   => $checkBox,
            'approved'      => $request->approved,
            'status_leave'  => $request->status_leave,
            'updated_at'    => $now,
        ]);

        if($leaveUpdate){
            Log::info('update ข้อมูล leave โดย '.Auth::user()->name);
            Session::flash('masupdate','แก้ไขข้อมูลฝ่ายเรียบร้อยแล้ว');
            return redirect('leave');
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
        $leaveDelete = Leave::where('id',$request->depId)
            ->delete();

        if($leaveDelete){
            Log::info('destroy ข้อมูล leave โดย '.Auth::user()->name);
            Session::flash('masdelete','ลบข้อมูลฝ่ายเรียบร้อยแล้ว');
            return redirect('leave');
        }
    }
}
