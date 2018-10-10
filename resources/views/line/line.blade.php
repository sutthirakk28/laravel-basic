@extends('layouts.tpm')

@section('css')
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book"></i> ข้อมูลพนักงาน</a></div>
  </div>  
@endsection

@section('content')
    @php
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
			'message' => $massage,
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

		var_dump($result); 
		
		$result = json_decode($result,TRUE);

		

		if(!is_null($result) && array_key_exists('status',$result)){
			if($result['status']==200){
				echo "Pass";
			}
		}
	  
    @endphp
	<form >
		First name: <input type="text" name="id" id="id"><br>
		
		<input type="Submit" value="Submit" >
	</form>
	<br>
	<h3> {{ $massage }} คน </h3>
	<br>
    
@endsection

@section('js')
<script>
$(document).ready(function(){

	
});
</script>
@endsection

