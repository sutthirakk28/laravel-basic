<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use Carbon\Carbon;
use Session;
use GuzzleHttp\Client;
use App\Sendcode;
use Nexmo\Laravel\Facade\Nexmo;
use Response;

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
            'user' => $result,
            'style' => $aCss,
        );
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
            'style' => $aCss,
        );
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
            /* $client = new Client();
            $reponse = $client->post('https://www.google.com/recaptcha/api/siteverify', [
                'form_params' => array(
                    'secret' => '6Levm3AUAAAAAOm1FFyN3OCKOl8Ksw46XJfn9S3t',
                    'response' => $token2
                )
            ]);
            $results = json_decode($reponse->getBody()->getContents());
            if($results->success){
                dd($results);
                Session::flash('success','You we know you are human');
            }else{
                Session::flash('erroe','You are probably a robot!');
            }*/

            $this->validate($request,[
                'username' => 'required|max:100',
                'email' => 'required|email|max:100|unique:users',
                'password' => 'required|string|min:6|confirmed',
                'phone' => 'max:15',
            ]);
            
            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'type' => 2,
                'phone' => $request->phone,
                'created_at' => $now,
                
            ]);  
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
            'user' => $result,
            'style' => $aCss
        );
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
                'user' => $result,
                'style' => $aCss
            ); 
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
                'to' => $user->phone,
                'from' => 'TPM(1980)_HR',
                'text' => $user->name.' Login BY '.$user->email,
            ]);
             
            $result = $user->phone;
            $response = array(
            'nexmo' => $result
            );
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
                'name' => $request->username,
                'email' => $request->email,
                'updated_at' => $now,
                'phone' => $request->phone,
            ]);
        }else{
            $adminUpdate = User::where('id',$id)
            ->update([
                'name' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'updated_at' => $now,
                'phone' => $request->phone,
            ]);
        } 

        if($request->id_user == 'profile'){
            return redirect('/profile');
        }else{
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
            Session::flash('masdelete','ลบข้อมูลผู้ดูแลเรียบร้อยแล้ว');
            return redirect('/manage_Users');
        }
    }
}
