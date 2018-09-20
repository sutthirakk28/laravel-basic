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
    $Token = "1XNgfRJwJMIOjZ3rgBnBY2qRyUd0RaBHFMUVOgcpVMd";
    $message = "ทำอะไรอยู่";
    $lineapi = $Token;
	$mms =  trim($message);
	date_default_timezone_set("Asia/Bangkok");
			$chOne = curl_init(); 
			curl_setopt( $chOne, CURLOPT_URL, "https://notify-api.line.me/api/notify");
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYHOST, 0); 
			curl_setopt( $chOne, CURLOPT_SSL_VERIFYPEER, 0); 
			curl_setopt( $chOne, CURLOPT_POST, 1);			
			curl_setopt( $chOne, CURLOPT_POSTFIELDS, "message=$mms");			
			curl_setopt( $chOne, CURLOPT_FOLLOWLOCATION, 1);			
			$headers = array( 'Content-type: application/x-www-form-urlencoded', 'Authorization: Bearer '.$lineapi.'', ); 
			curl_setopt($chOne, CURLOPT_HTTPHEADER, $headers);			
			curl_setopt( $chOne, CURLOPT_RETURNTRANSFER, 1); 
			$result = curl_exec( $chOne ); 
			if(curl_error($chOne)) 
				{ 
				echo 'error:' . curl_error($chOne); 
			} 
			else { 
				$result_ = json_decode($result, true); 
				echo "status : ".$result_['status']; echo "message : ". $result_['message'];
} 
			curl_close( $chOne );   
    @endphp
            <h3> {{ $massage }} คน </h3>
            <br>
    
@endsection

@section('js')
@endsection

