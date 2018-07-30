@extends('layouts/main')
@section('title')
ข้อมูลประวัติการลา
@endsection
@section('content')

@php
    function getDate1($day,$day2) {
      $diff  = date_diff( date_create($day), date_create($day2) );
      return($diff->y.' ปี '.$diff->m.' เดือน '.$diff->d.' วัน');
    }

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
      $thai_date_return= date("j",$time);
      $thai_date_return.=" ".$thai_month_arr[date("n",$time)];
      $thai_date_return.= " ".(date("Y",$time)+543);
      return $thai_date_return;
    }

  @endphp
	<h1 class="elegantshadow">ประวัติการลา</h1>	
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

	<table id="leave" class="table table-striped table-bordered nowrap center" style="width:100%">
		<thead class="thead">
			<tr>
				<th width="100">วันที่ยื่น</th>
				<th >รูป</th>
				
				<th >วันที่ลา</th>
				<th >ชื่อ-นามสกุล</th>
				<th width="300">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($leave as $l)
			<tr >				
				<td>{{ thai_date(strtotime($l['date_leave'])) }}</td>
				<td>
					{{ Html::image('images/'.$l['user_photo'], '', array('class' => 'image')) }}
				</td>
				<td>
					{{ thai_date(strtotime($l['dstart_leave'])) }} 
					ถึง 
					{{ thai_date(strtotime($l['dend_leave'])) }}
					{{ getDate1($l['dend_leave'],$l['dstart_leave']) }}
				</td>
				<td>{{ $l['surname'].'/'.$l['nickname']}}</td>				
				<td class="center">
					{{ Form::open(['route' => ['leave.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
					<input type="hidden" name="_method" value="delete"/>
					{{ Html::link('leave/create','Add', array(	'class' => 'btn btn-primary thead')) }}
					{{ Html::link('leave/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('leave/'.$id=$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
					{{ Form::submit('Delete',array('class' => 'btn btn-danger','onclick'=>"return confirm('คำเตือน! เมื่อลบฝ่ายข้อมูลอาจเกิดข้อมผิดพลาดได้ ควรปรับเป็นการแก้ไขดีกว่า ?')" )) }}
					{{ Form::close()}}
				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
@endsection
