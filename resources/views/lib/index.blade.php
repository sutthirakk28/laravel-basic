@extends('layouts/main')

@section('content')
	<h1>ระบบจัดการพนักงาน</h1>	
	@if(Session::has('message'))
		<div class=" alert alert-info">
			{{ Session::get('message') }}
		</div>
	@endif
	<h2> {{ Session::get('name') }}</h2>
	<h2> {{ Session::get('language') }}</h2>
	<table class="table table-bordered">
		<thead>
			<tr>
				<th width="30">รหัส</th>
				<th>ชื่อ - นามสกุล</th>
				<th>ชื่อเล่น</th>
				<th>อายุ</th>
				<th>ตำแหน่ง</th>
				<th>วันเริ่มงาน</th>
				<th>อายุงาน/วัน</th>
				<th width="200">Action</th>
			</tr>
		</thead>
		<tbody>
			@forelse ($lib as $l)
				<tr>
					<td>{{ $l['id_employ'] }}</td>
					<td>{{ $l['surname'] }}</td>
					<td>{{ $l['nickname'] }}</td>
					<td>{{ $age.' ปี' }}</td>
					<td>{{ $l['position'] }}</td>
					<td>{{ $l['job_start'] }}</td>
					<td>{{ $l['job_start'] }}</td>
					<td>
							{{ Form::open(['route' => ['lib.destroy',$l['id'], 'method' => 'DELETE'] ]) }}
							<input type="hidden" name="_method" value="delete"/>
							{{ Html::link('lib/'.$l['id'], 'View', array('class' => 'btn btn-success')) }}
							{{ Html::link('lib/'.$l['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}
							{{ Form::submit('Delete',array('class' => 'btn btn-danger')) }}
							{{ Form::close()}}
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="6">No data</td>
				</tr>
			@endforelse

		</tbody>
	</table>
	<div class="row">
		<div class="col-xs-5">
			{{ Html::link('lib/create','เพิ่มพนักงาน', array(
				'class' => 'btn btn-primary'
			))
		}}
		</div>
	</div>
@endsection
