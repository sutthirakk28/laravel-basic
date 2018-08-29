<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Task;
use Carbon\Carbon;
use Response;
use Session;
use Validator;
use Redirect;

class TasksController extends Controller
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
        $aCss=array('css/tasks/style.css');
        $tasks = Task::all();
        $result = json_decode($tasks, true);
        $data = array(
            'tasks' => $result,
            'style' => $aCss
        );

        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
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

        $Tasks = new Task();
        $Tasks->name = $request->name;
        $Tasks->description = $request->description;
        $Tasks->task_date = $request->task_date;
        $Tasks->created_at = $now;

        $Tasks->save();

        // $tasks_show = Task::all();            
        // $result = json_decode($tasks_show, true);
        $data = array(
            'id' => $Tasks->id,
            'success' => 'เพิ่มข้อมูลกิจกรรมเรียบร้อยแล้ว',
        );
        return response()->json($data);
         
        //return response()->json(['success'=>'เพิ่มข้อมูลกิจกรรมเรียบร้อยแล้ว']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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

    public function edit_task(Request $request)
    {
        $now = new Carbon();
        $tasksUpdate = Task::where('id',$request->id)
        ->update([
            'name' => $request->name,
            'description' => $request->description,
            'task_date' => $request->task_date,
            'updated_at' => $now,
        ]);
        // $success1 = 'Data is successfully Edit';
        // $data = array(
        //     'success' => $success1,
        // );
        // return response()->json($data);
        return response()->json(['success'=>'แก้ไขข้อมูลเรียบร้อยแล้ว']);
        
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
