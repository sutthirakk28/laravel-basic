@extends('layouts/main')
@section('title')
เพิ่มข้อมูลตำแหน่ง
@endsection
@section('content')

	<div class="panel panel-primary div1">
		<div class="panel-heading">
				แบบฟอร์มเพิ่มข้อมูลตำแหน่ง
		</div>
				{{ Form::open(['url' => 'pos']) }}		
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
					{{ form::label('id_pos','รหัสตำแหน่ง') }}
				</div>
				<div class="col-xs-5">
						{{ form::text('id_pos', 'อัตโนมัติ', ['class' => 'form-control', 'readonly' => 'true']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('name_dep','เลือกฝ่าย') }}
				</div>
				<div class="col-xs-5 ">
					<select name="name_dep" id="name_dep" class="selectpicker show-tick select" data-live-search="true">
						<option value="" selected disabled>กรุณาเลือกฝ่าย</option>
					  @foreach($dep as $d)
					    <option data-tokens="{{ $d['name_dep'] }}" value="{{ $d->id_dep }}">{{ $d['name_dep'] }}</option>
					  @endforeach
					</select>	
				</div>
			</div>
		</div>	
		<div class="panel-body">
			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('name_pos','ชื่อตำแหน่ง') }}
				</div>
				<div class="col-xs-5">
						{{ form::text('name_pos','', ['class' => 'form-control']) }}
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