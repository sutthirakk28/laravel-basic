<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Response;

class LineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aCss=array('css/line/style.css');
        $a = "ส่งสำเร็จ";
        $data = array(
            'style' => $aCss,
            'massage' => $a,
        );
        return view('line.index',$data);
    }


    public function line(Request $request)
    {
        $aCss=array('css/line/style.css');
        $a = $request->id;
        $data = array(
            'style' => $aCss,
            'massage' => $a,
        );
        return view('line.line',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->ajax()){ 
            ini_set('display_errors', 1);
            ini_set('display_startup_errors', 1);
            error_reporting(E_ALL); 
            
            $accToken = "DveiwigtPYZhh0e88Z6qfd1AIGOpiqOqcs9ZnfAa4AT";
            $notifyURL = "https://notify-api.line.me/api/notify";
            
            $headers = array(
                'Content-Type: application/x-www-form-urlencoded',
                'Authorization: Bearer '.$accToken
            );

            $data = array(
                'message' => $request->id,
                'stickerPackageId' => 2,
                'stickerId' => 22,            
            ); 

            $ch = curl_init();
            curl_setopt( $ch, CURLOPT_URL, $notifyURL);
            curl_setopt( $ch, CURLOPT_POST, 1);
            curl_setopt( $ch, CURLOPT_POSTFIELDS, http_build_query($data));
            curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt( $ch, CURLOPT_SSL_VERIFYHOST, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 2
            curl_setopt( $ch, CURLOPT_SSL_VERIFYPEER, 0); // ถ้าเว็บเรามี ssl สามารถเปลี่ยนเป้น 1
            curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
            curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec( $ch );
            curl_close( $ch ); 

            //var_dump($result); 
            
            $result = json_decode($result,TRUE);       

            if(!is_null($result) && array_key_exists('status',$result)){
                if($result['status']==200){
                    //echo "Pass"; 
                    $result2 = "ส่งแล้ว";        
                    $response2 = array(
                        'line' => $result2,
                        'status' => $result['status'],
                    );
                    return response()->json($response2);                   
                }
            }
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
