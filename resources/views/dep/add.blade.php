@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
				<div id="breadcrumb">
				<a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> จัดการข้อมูลฝ่าย</a>
				<a href="#">แก้ไขจัดการข้อมูลฝ่าย</a>
				</div>
                <h1>Form validation</h1>
			</div>
 
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

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/main/maruti.form_validation.js') }}"></script>
@endsection