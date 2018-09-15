<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

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
        
        $user = DB::table('users')
            ->select('id','name','email','created_at', 'updated_at')
            ->whereRaw("id = $id")
            ->get();

        $result = json_decode($user, true);
        $data = array(
            'profile' => $result,
        );
       //dd($data);
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
        $now = new Carbon();

        $this->validate($request,[
            'username' => 'required|max:100',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $user =  User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'created_at' => $now,
        ]);

        //dd($a);
        if($user){
            return view('admin.index');
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
            ->select('id','name','email','created_at', 'updated_at')
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
