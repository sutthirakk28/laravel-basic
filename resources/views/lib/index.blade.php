@extends('layouts/main')
@section('title')
ระบบจัดการข้อมูลพนักงาน
@endsection
@section('content')
	<h1 class="h1">ระบบจัดการข้อมูลพนักงาน</h1>	
	@if(Session::has('message'))
		<div class=" alert alert-info">
			{{ Session::get('message') }}
		</div>
	@endif
	<table id="lib" class="table table-striped table-bordered nowrap" style="width:100%">
		<thead class="thead">
			<tr>
				<th width="30">รหัส</th>
				<th>ชื่อ - นามสกุล</th>
				<th>ชื่อเล่น</th>
				<th>อายุ</th>
				<th>ฝ่าย</th>
				<th>ตำแหน่ง</th>
				<th>อายุงาน</th>
				<th width="200">Action</th>
			</tr>
		</thead>
		<tbody>
			@php
			function getAge($birthday) {
            	$then = strtotime($birthday);
            	return(floor((time()-$then)/31556926));
        	}				

			function getDate1($day) {
        		$diff  = date_diff( date_create($day), date_create() );
				return($diff->y.' ปี '.$diff->m.' เดือน '.$diff->d.' วัน');

        	}
        	@endphp

			@foreach ($lib as $l)
				<!-- <tr >
					<td>{{ $l['libs.id_employ'] }}</td>
					<td>{{ $l['libs.surname'] }}</td>
					<td>{{ $l['libs.nickname'] }}</td>
					<td>{{ getAge($l['libs.age']).' ปี'}}</td>
					<td></td>
					<td>{{ $l['pos.name_pos'] }}</td>								
					<td>{{ getDate1($l['libs.job_start']) }}</td>
					<td class="center">
							{{ Form::open(['route' => ['lib.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
							<input type="hidden" name="_method" value="delete"/>
							{{ Html::link('lib/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
							{{ Html::link('lib/'.$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
							{{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}
							{{ Form::close()}}
					</td>
				</tr> -->
				<tr >
					<td>
					</td>
				</tr>
			@endforeach

		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-5">
			{{ Html::link('lib/create','เพิ่มพนักงาน', array(
				'class' => 'btn btn-primary thead'
			))
		}}
		</div>
	</div>
@endsection
