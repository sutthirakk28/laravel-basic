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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TasksController extends Controller
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
        $aCss=array('css/tasks/style.css');
        $tasks = Task::all();
        $result = json_decode($tasks, true);
        $data = array(
            'tasks' => $result,
            'style' => $aCss
        );
        Log::info('index ข้อมูล tasks.index โดย '.Auth::user()->name);
        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Log::info('create ข้อมูล tasks.create โดย '.Auth::user()->name);
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

        $data = array(
            'id' => $Tasks->id,
            'success' => 'เพิ่มข้อมูลกิจกรรมเรียบร้อยแล้ว',
        );
        Log::info('store ข้อมูล tasks โดย '.Auth::user()->name);
        return response()->json($data);
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
        Log::info('edit_task ข้อมูล tasks โดย '.Auth::user()->name);
        return response()->json(['success'=>'แก้ไขข้อมูลเรียบร้อยแล้ว']);
        
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Task::destroy($request->id);
        Log::info('destroy ข้อมูล tasks โดย '.Auth::user()->name);
        return response()->json(['success'=>'ลบข้อมูลเรียบร้อยแล้ว']);
    }
}
