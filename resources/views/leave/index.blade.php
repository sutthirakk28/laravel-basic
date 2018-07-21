@extends('layouts/main')
@section('title')
ระบบจัดการข้อมูลพนักงาน
@endsection
@section('content')

@php    
    function thai_date($time){
      $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");
      $thai_month_arr=array(
        "0"=>"",
        "1"=>"ม.ค.",
        "2"=>"ก.พ.",
        "3"=>"มี.ค.",
        "4"=>"เม.ย.",
        "5"=>"พ.ค.",
        "6"=>"มิ.ย.",
        "7"=>"ก.ค.",
        "8"=>"ส.ค.",
        "9"=>"ก.ย.",
        "10"=>"ต.ค.",
        "11"=>"พ.ย.",
        "12"=>"ธ.ค."
      );
      $thai_date_return="วัน ".$thai_day_arr[date("w",$time)];
      $thai_date_return.= " ที่ ".date("j",$time);
      $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
      $thai_date_return.= " ".(date("Y",$time)+543);
      $thai_date_return.= "  ".date("H:i",$time)." น.";
      return $thai_date_return;
    }

  @endphp
	<h1 class="elegantshadow">จัดการข้อมูลฝ่าย</h1>	
	@if(Session::has('masupdate'))
		<div class="alert alert-success alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('masupdate') }}
		</div>
	@endif
	@if(Session::has('masdelete'))	
		<div class="alert alert-danger alert-dismissible fade in">
			<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
			{{ Session::get('masdelete') }}
		</div>
	@endif

	<table id="dep" class="table table-bordered" style="wid_depth:100%">
		<thead class="thead">
			<tr>
				<th width="100">รหัส</th>
				<th >ชื่อฝ่าย</th>
				<th width="300">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($dep as $d)
			<tr >
				<td>{{ $d['id_dep'] }}</td>
				<td>{{ $d['name_dep'] }}</td>
				
				<td class="center">
					{{ Form::open(['route' => ['leave.destroy',$d['id_dep'], 'method' => 'DELETE'] ]) }}
					<input type="hidden" name="_method" value="delete"/>
					{{ Html::link('leave/create','Add', array(	'class' => 'btn btn-primary thead')) }}
					{{ Html::link('leave/'.$d['id_dep'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('leave/'.$id=$d['id_dep'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
					{{ Form::submit('Delete',array('class' => 'btn btn-danger','onclick'=>"return confirm('คำเตือน! เมื่อลบฝ่ายข้อมูลอาจเกิดข้อมผิดพลาดได้ ควรปรับเป็นการแก้ไขดีกว่า ?')" )) }}
					{{ Form::close()}}
				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
@endsection
