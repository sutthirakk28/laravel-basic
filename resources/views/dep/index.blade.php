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
	<h1 class="h1">จัดการข้อมูลฝ่าย</h1>	
	@if(Session::has('massage'))
		<div class=" alert alert-info">
			{{ Session::get('massage') }}
		</div>

	@endif
	<table id_dep="lib" class="table table-striped table-bordered nowrap" style="wid_depth:100%">
		<thead class="thead">
			<tr>
				<th width="100">รหัส</th>
				<th>ชื่อฝ่าย</th>
				<th >สร้างเมื่อ</th>
				<th>แก้ไขเมื่อ</th>
				<th width="300">Action</th>
			</tr>
		</thead>
		<tbody>
			@foreach ($dep as $d)
			<tr >
				<td>{{ $d['id_dep'] }}</td>
				<td>{{ $d['name_dep'] }}</td>
				<td>{{ thai_date(strtotime($d['created_at'])) }}</td>
				<td>{{ thai_date(strtotime($d['updated_at'])) }}</td>
				<td class="center">
					{{ Form::open(['route' => ['dep.destroy',$d['id_dep'], 'method' => 'DELETE'] ]) }}
					<input type="hidden" name="_method" value="delete"/>
					{{ Html::link('dep/'.$d['id_dep'], 'View', array('class' => 'btn btn-success')) }}
					{{ Html::link('dep/'.$ib=$d['id_dep'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
					{{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}
					{{ Form::close()}}
				</td>
			</tr>				
			@endforeach
		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-5">
			{{ Html::link('dep/create','เพิ่มฝ่าย', array(
				'class' => 'btn btn-primary thead'
			))
		}}
		</div>
	</div>
@endsection
