@extends('layouts.tpm')

@section('css')
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book
"></i> ข้อมูลพนักงาน</a></div>
  </div>  
@endsection

@section('content')
    @php
    define('LINE_API',"https://notify-api.line.me/api/notify");
 
        $token = "J6g82y9oB4uMMSmw4UdFUlU5udm7zLpaaftMG9PNZuF";
        $str = "ทำอะไรอยู่";
        
        $res = notify_message($str,$token);

        function notify_message($message,$token){
        $queryData = array('message' => $message);
        $queryData = http_build_query($queryData,'','&');
        $headerOptions = array( 
                'http'=>array(
                    'method'=>'POST',
                    'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                            ."Authorization: Bearer ".$token."\r\n"
                            ."Content-Length: ".strlen($queryData)."\r\n",
                    'content' => $queryData
                ),
        );
        $context = stream_context_create($headerOptions);
        $result = file_get_contents(LINE_API,FALSE,$context);
        $res = json_decode($result);
        return $res;
        }
    @endphp
            <h3> {{ $massage }} คน </h3>
            <br>
    
@endsection

@section('js')
@endsection
