
@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book
"></i> ข้อมูลพนักงาน</a></div>
  </div>  
@endsection

@section('content')

@if(Session::has('masupdate'))
	<div id="gritter-notify">
  <div class="normal"></div>
</div>

@endif
@if(Session::has('masdelete'))		
<div id="gritter-notify">
  <div class="sticky"></div>
</div>
@endif

@php
function getAge($birthday) {
	$then = strtotime($birthday);
	return(floor((time()-$then)/31556926));
}				

function getDate1($day) {
	$diff  = date_diff( date_create($day), date_create() );
	return($diff->y.' ปี '.$diff->m.' เดือน '.$diff->d.' วัน');

}

function count_day($day1){
  $date1=date_create($day1);
  $date2=date_create(date("Y-m-d"));
  $d=date_diff($date1,$date2);
  $count = $d->format("%a");
  return $count;
}
@endphp

<div class="container-fluid">
	<div class="row-fluid">
	  <div class="span12">
	    <div class="widget-box">
	      <div class="widget-title">
	         <span class="icon"><i class="icon-th"></i></span> 
	        <h5 class="f_th1">จัดการข้อมูลตำแหน่ง</h5>
	      </div>
	      <div class="widget-content nopadding">
	        <table class="table table-bordered data-table">
	          <thead>
	            <tr>
				 	<th width="30">รหัส</th>
					<th>รูปภาพ</th>
					<th>ชื่อ - นามสกุล</th>
					<th>ชื่อเล่น</th>
					<th width="20">อายุ</th>
					<th>ฝ่าย</th>
					<th>ตำแหน่ง</th>
					<th>อายุงาน</th>
					<th width="200">Action</th>
				</tr>
	          </thead>
	          <tbody>
	            @foreach ($lib as $l)
	            <tr >
	            	@php
	                  $day_pro=count_day($l['job_start']);
	                @endphp
	            	<td>
	            		{{ $l['id_employ'] }}
	            		@if($day_pro >= '119')
		                	<span class="label label-important2">ผ่านโปร</span>
		                @else
		                	@php $total = $day_pro - 119; @endphp
		                    <span class="label label-important">ไม่ผ่านโปร {{$total}}</span>
		                @endif
	            	</td>
					<td>
						{{ Html::image('images/'.$l['user_photo'], '', array('class' => 'image')) }}
					</td>
					<td>{{ $l['surname'] }}</td>
					<td>{{ $l['nickname'] }}</td>
					<td>{{ getAge($l['age']).' ปี'}}</td>        
			      	<td>{{ $l['name_dep'] }}</td>
					<td>{{ $l['name_pos'] }}</td>							
					<td>{{ getDate1($l['job_start']) }}</td>	             

	              <td class="center">                                        
	                {{ Html::link('lib/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('lib/'.$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}                   
	                <a href="#myAlert" data-toggle="modal" data-id="{{$l['id']}}" class="addDialog btn btn-danger">Delete</a>
	                
	                <!--modal delete -->
	                <div id="myAlert" class="modal hide">
	                  <div class="modal-header">
	                    <button data-dismiss="modal" class="close" type="button">×</button>
	                    <h3><i class="material-icons" style="font-size:15px;color:red">error_outline</i> คำเตือน! </h3>
	                  </div>
	                  <div class="modal-body">
	                    <p>เมื่อลบข้อมูลพนักงานอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
	                  </div>
	                  <div class="modal-footer">
	                    {{ Form::open(['route' => ['lib.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
	                    <input type="hidden" name="_method" value="delete"/>
	                    <input type="hidden" name="depId" value="" id="depId"> 
	                    {{ Form::submit('Confirm',array('class' => 'btn btn-primary')) }}
	                    <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
	                    {{ Form::close()}} 
	                    
	                  </div>
	                </div>
	                <!--end modal delete -->
	              </td>
	            </tr>
	            @endforeach
	          </tbody>
	        </table>
	      </div>
	    </div>       
	  </div>
	</div>
</div>
<div class="container-fluid">
	<div class="row-fluid">
	  <div class="span12">
	    {{ Html::link('lib/create','Add', array(  'class' => 'btn btn-primary thead')) }}
	  </div>
	</div>
</div>
@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>

<script src="{{ asset('js/main/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.interface.js') }}"></script>
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>
@endsection
