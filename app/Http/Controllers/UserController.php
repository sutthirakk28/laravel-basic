<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;
use App\User;
use Response;
use Session;
use DB;
use Nexmo\Laravel\Facade\Nexmo;

class UserController extends Controller
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
        $aCss=array('css/admin/style.css');
        $user = User::all();

        $result = json_decode($user, true);
        $data = array(
            'user'  => $result,
            'style' => $aCss,
        );
        Log::info('Index ข้อมูล admin.index โดย '.Auth::user()->name);
        return view('admin.index',$data);
    }

    public function profile()
    {        
        $id = Auth::id();

        $aCss=array('css/admin/style.css');
        $user = DB::table('users')
            ->select('id','name','email','created_at', 'updated_at','type','phone')
            ->whereRaw("id = $id")
            ->get();

        $result = json_decode($user, true);
        $data = array(
            'profile' => $result,
            'style'   => $aCss,
        );
        Log::info('Profile แก้ไขข้อมูล admin.profile โดย '.Auth::user()->name);
        return view('admin.profile',$data);
    }

    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aCss=array('css/admin/style.css');
        $data = array(
            'style' => $aCss,
        );
        Log::info('Create ข้อมูล admin.create โดย '.Auth::user()->name);
        return view('admin.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $token2 = $request->input('g-recaptcha-response');
        if(strlen($token2) >= 0){
            $now = new Carbon();
            $this->validate($request,[
                'username' => 'required|max:100',
                'email'    => 'required|email|max:100|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'phone'    => 'max:15',
            ]);
            
            User::create([
                'name'     => $request->username,
                'email'    => $request->email,
                'password' => bcrypt($request->password),
                'type'     => 2,
                'phone'    => $request->phone,
                'active'   => 0,
                'created_at'=> $now,
                
            ]);
            Log::info('Store ข้อมูล /manage_Users โดย '.Auth::user()->name);  
            return redirect('/manage_Users');
        }else{
            return view('admin.create');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aCss=array('css/admin/style.css');

        $user = DB::table('users')
            ->select('id','name','email','created_at', 'updated_at','type','phone')
            ->whereRaw("id = $id")
            ->get();

        $result = json_decode($user, true);

        $data = array(
            'user'  => $result,
            'style' => $aCss
        );
        Log::info('Show ข้อมูล admin.show โดย '.Auth::user()->name);
        return view('admin.show',$data);
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
            $aCss=array('css/admin/style.css');       
            $user = DB::table('users')
                ->select('id','name','email','created_at', 'updated_at','phone')
                ->whereRaw("id = $id")
                ->get();
            $result = json_decode($user, true);
            $data = array(
                'user'  => $result,
                'style' => $aCss
            );
            Log::info('Edit ข้อมูล admin.edit โดย '.Auth::user()->name); 
            return view('admin.edit',$data);
        }
    }

    public function nexmo(Request $request)
    {
        $user = User::find($request->id);

        if($request->ajax())
        {   
            $basic  = new \Nexmo\Client\Credentials\Basic('ae2c69eb', '4SXJVnnhqka0kK5g');
            $client = new \Nexmo\Client($basic);
            $message = $client->message()->send([
                'to'   => $user->phone,
                'from' => 'TPM(1980)_HR',
                'text' => $user->name.' Login BY '.$user->email,
                'type' => 'unicode'
            ]);
             
            $result = "SMS ส่งข้อมูลผู้ดูแลเรียบร้อยแล้ว";
            $response = array(
            'nexmo' => $result
            );
            Log::alert('SMS ส่งข้อมูลผู้ดูแลเรียบร้อยแล้ว โดย '.Auth::user()->name);
            return response()->json($response);
        }
    }
    public function nexmo1(Request $request)
    {
        if($request->ajax())
        {
            $user = User::find($request->id);

            // Nexmo::message()->send([
            //     'to'   => '66896901952',
            //     'from' => 'ตุ่ย',
            //     'text' => 'การแจ้งเตือน',
            //     'type' => 'unicode'
            // ]);


            $result = "SMS ส่งข้อมูลผู้ดูแลของ ".$user->name." เรียบร้อยแล้ว";
            $response = array(
                'nexmo' => $result
            );
            Log::alert($result);
            return response()->json($response);
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
            'username' => 'required|max:100',
            'email' => 'required|email|max:100',
            'password' => 'confirmed',
            'phone' => 'max:15',
        ]);
        $now = new Carbon();

        if($request->password === NULL){
            $adminUpdate = User::where('id',$id)
            ->update([
                'name'      => $request->username,
                'email'     => $request->email,
                'updated_at'=> $now,
                'phone'     => $request->phone,
            ]);
        }else{
            $adminUpdate = User::where('id',$id)
            ->update([
                'name'      => $request->username,
                'email'     => $request->email,
                'password'  => bcrypt($request->password),
                'updated_at'=> $now,
                'phone'     => $request->phone,
            ]);
        }         

        if($request->id_user == 'profile'){
            Log::info('Update ข้อมูล /profile โดย '.Auth::user()->name);
            return redirect('/profile');
        }else{
            Log::info('Update ข้อมูล /manage_Users โดย '.Auth::user()->name);
            Session::flash('masupdate','แก้ไขข้อมูลผู้ดูแลเรียบร้อยแล้ว');
            return redirect('/manage_Users');
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
        $user = User::find($request->depId);
        $user->delete();
        if($user){
            Log::info('Destroy ข้อมูล /manage_Users โดย '.Auth::user()->name);
            Session::flash('masdelete','ลบข้อมูลผู้ดูแลเรียบร้อยแล้ว');
            return redirect('/manage_Users');
        }
    }
}
