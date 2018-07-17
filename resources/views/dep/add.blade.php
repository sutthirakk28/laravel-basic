@extends('layouts/main')
@section('title')
เพิ่มข้อมูลฝ่าย
@endsection
@section('content')
	
	<div class="panel panel-primary div1">
		<div class="panel-heading">
				แบบฟอร์มเพิ่มข้อมูลฝ่าย
		</div>
				{{ Form::open(['url' => 'dep']) }}		
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
					{{ form::label('id_dep','รหัสฝ่าย') }}
				</div>
				<div class="col-xs-5">
						{{ form::text('id_dep', 'อัตโนมัติ', ['class' => 'form-control', 'readonly' => 'true']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('name_dep','ชื่อฝ่าย') }}
				</div>
				<div class="col-xs-5">
						{{ form::text('name_dep','', ['class' => 'form-control']) }}
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