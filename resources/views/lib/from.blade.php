@extends('layouts/main')
@section('title')
เพิ่มข้อมูลพนักงาน
@endsection
@section('content')
	<div class="panel panel-primary div1">
		<div class="panel-heading">
			@if(isset($lib))
				Edit form
			@else
				แบบฟอร์มเพิ่มข้อมูลพนักงาน
			@endif
		</div>
			@if(isset($lib))
				{{ Form::open(['method' => 'put','route' =>['lib.update', $lib->id] ])}}
			@else
				{{ Form::open(['url' => 'lib']) }}
			@endif

		
		 <div class="panel-body">
		 	@if(count($errors) > 0 )
				<div class=" alert alert-danger">
					<ul>
						@foreach($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
		 	@endif
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('id_employ','รหัสพนักงาน') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->nickname))
						{{ form::text('id_employ', $lib->id_employ, ['class' => 'form-control'] ) }}
					@else
						{{ form::text('id_employ', '', ['class' => 'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('surname','ชื่อ-นามสกุล') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->title))
						{{ form::text('surname',$lib->surname, ['class' => 'form-control']) }}
					@else
						{{ form::text('surname','', ['class' => 'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('nickname','ชื่อเล่น') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->nickname))
						{{ form::text('nickname', $lib->nickname, ['class' => 'form-control'] ) }}
					@else
						{{ form::text('nickname', '', ['class' => 'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('age','อายุ') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->star))
						{{ form::date('age', $lib->age, ['class'=>'form-control']) }}
					@else
						{{ form::date('age', '', ['class'=>'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('position','ตำแหน่ง') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->star))
						{{ form::text('position', $lib->position, ['class'=>'form-control']) }}
					@else
						{{ form::text('position', '', ['class'=>'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('job_start','วันเริ่มงาน') }}
				</div>
				<div class="col-xs-5">
					@if(isset($lib->y_work))
						{{ form::date('job_start', $lib->job_start, ['class'=>'form-control']) }}
					@else
						{{ form::date('job_start', '', ['class'=>'form-control']) }}
					@endif
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-5">
					{{ form::submit('Save',['class' => 'btn btn-primary'] ) }}
				</div>
			</div>
		</div> 
	</div>
	<div class="row">
		<div class="col-xs-2">
			
		</div>
		{{ Form::close() }}		
	</div>
@endsection