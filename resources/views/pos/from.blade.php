@extends('layouts/main')
@section('title')
เพิ่มข้อมูลตำแหน่ง
@endsection
@section('content')

@foreach ($pos as $poss)
	<div class="panel panel-primary div1">
		<div class="panel-heading">
				แบบฟอร์มแก้ไข้อมูลตำแหน่ง
		</div>
				{{ Form::open(['method' => 'put','route' =>['pos.update', $poss['id_pos'] ]]) }}
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
						{{ form::text('id_pos', $poss['id_pos'], ['class' => 'form-control', 'readonly' => 'true'] ) }}
				</div>
			</div>
		</div>		
		<div class="panel-body">			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('id_dep','เลือกฝ่าย') }}
				</div>
				<div class="col-xs-5 ">
					<select name="id_dep" id="id_dep" class="selectpicker show-tick select" data-live-search="true">
						@foreach($dep as $d)
						  	@if($d->id_dep == $poss['id_dep'])
						  		<option data-tokens="{{ $d['name_dep'] }}" value="{{ $d->id_dep }}" selected>{{ $d['name_dep'] }}</option>
						  	@else
						  		<option data-tokens="{{ $d['name_dep'] }}" value="{{ $d->id_dep }}">{{ $d['name_dep'] }}</option>
						  	@endif					    
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
						{{ form::text('name_pos',$poss['name_pos'], ['class' => 'form-control']) }}
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
@endforeach
@endsection