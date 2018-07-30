@extends('layouts/main')
@section('title')
เพิ่มข้อมูลพนักงาน
@endsection
@section('content')
	<div class="panel panel-primary div1">
		<div class="panel-heading">
			แบบฟอร์มเพิ่มข้อมูลพนักงาน
		</div>
				{{ Form::open(['url' => 'lib','files' => true]) }}
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
					{{ form::text('id_employ', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('user_photo','รูปภาพ',['class' => 'control-label']) }}
				</div>
				<div class="col-xs-5">
					{{ form::file('user_photo',['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('surname','ชื่อ-นามสกุล',['class' => 'control-label']) }}
				</div>
				<div class="col-xs-5">
					{{ form::text('surname','', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('nickname','ชื่อเล่น') }}
				</div>
				<div class="col-xs-5">
					{{ form::text('nickname', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('age','อายุ') }}
				</div>
				<div class="col-xs-5">
					{{ form::date('age', '', ['class'=>'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('position','ตำแหน่ง') }}
				</div>				
				<div class="col-xs-5 ">
					<select name="position" id="position" class="selectpicker show-tick select" data-live-search="true">
						<option value="" selected disabled>กรุณาเลือกฝ่าย</option>
					  @foreach($pos as $p)
					    <option data-tokens="{{ $p['name_pos'] }}" value="{{ $p['id_pos'] }}">{{ $p['name_pos'] }}</option>
					  @endforeach
					</select>	
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('job_start','วันเริ่มงาน') }}
				</div>
				<div class="col-xs-5">
					{{ form::date('job_start', '', ['class'=>'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('education','วุฒิการศึกษา') }}
				</div>				
				<div class="col-xs-5 ">
					<select name="education" id="education" class="selectpicker show-tick select" data-live-search="true">
						<option value="" selected disabled>กรุณาเลือกวุฒิการศึกษา</option>
					    <option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
					  	<option data-tokens="มัธยมศึกษาตอนปลาย" value="2">มัธยมศึกษาตอนปลาย</option>
					  	<option data-tokens="ปวช.(ประกาศนียบัตรวิชาชีพ)" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
					  	<option data-tokens="ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
					  	<option data-tokens="ปริญญาตรี" value="5">ปริญญาตรี</option>
					  	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
					  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>
					</select>	
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('n_education','คณะ/สาขา') }}
				</div>
				<div class="col-xs-5">
					{{ form::text('n_education', '', ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('phone','เบอร์โทรศัพท์') }}
				</div>
				<div class="col-xs-5">
					{{ form::text('phone', '', ['class' => 'form-control']) }}
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