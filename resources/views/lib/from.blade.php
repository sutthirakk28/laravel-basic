@extends('layouts/main')
@section('title')
เพิ่มข้อมูลพนักงาน
@endsection
@section('content')

@foreach($lib as $l)
	<div class="panel panel-primary div1">
		<div class="panel-heading">
				แบบฟอร์มแก้ไขข้อมูลพนักงาน
		</div>
	{{ Form::open(['method' => 'put','route' =>['lib.update', $l['id']],'files' => true ]) }}		
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
					{{ form::text('id_employ', $l['id_employ'], ['class' => 'form-control'] ) }}
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
					<input type="hidden" name="user_photoOld" value="{{ $l['user_photo'] }}"/>
				</div>
			</div>
		</div>
		<div class="panel-body">
			
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('surname','ชื่อ-นามสกุล') }}
				</div>
				<div class="col-xs-5">
					{{ form::text('surname',$l['surname'], ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('nickname','ชื่อเล่น') }}
				</div>
				<div class="col-xs-5">
					{{ form::text('nickname', $l['nickname'], ['class' => 'form-control'] ) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('age','อายุ') }}
				</div>
				<div class="col-xs-5">
					{{ form::date('age', $l['age'], ['class'=>'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('position','ตำแหน่ง') }}
				</div>
				<div class="col-xs-5 ">
					<select name="id_pos" id="id_pos" class="selectpicker show-tick select" data-live-search="true">
						@foreach($pos as $p)
						  	@if($p['id_pos'] == $l['position'])
						  		<option data-tokens="{{ $p['name_pos'] }}" value="{{ $p['id_pos'] }}" selected>{{ $p['name_pos'] }}</option>
						  	@else
						  		<option data-tokens="{{ $p['name_pos'] }}" value="{{ $p['id_pos'] }}">{{ $p['name_pos'] }}</option>
						  	@endif					    
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
					{{ form::date('job_start', $l['job_start'], ['class'=>'form-control']) }}
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
						@if ($l['education'] == 1)
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="1" selected>มัธยมศึกษาตอนต้น</option>
				          	<option data-tokens="มัธยมศึกษาตอนปลาย" value="2">มัธยมศึกษาตอนปลาย</option>
						  	<option data-tokens="ปวช.(ประกาศนียบัตรวิชาชีพ)" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
						  	<option data-tokens="ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
						  	<option data-tokens="ปริญญาตรี" value="5">ปริญญาตรี</option>
						  	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
						  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>  
				        @elseif($l['education'] == 2)
				        	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
							<option data-tokens="มัธยมศึกษาตอนต้น" value="2" selected>มัธยมศึกษาตอนปลาย</option>
				           	<option data-tokens="ปวช.(ประกาศนียบัตรวิชาชีพ)" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
						  	<option data-tokens="ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
						  	<option data-tokens="ปริญญาตรี" value="5">ปริญญาตรี</option>
						  	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
						  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option> 
				        @elseif($l['education'] == 3)
				        	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
							<option data-tokens="มัธยมศึกษาตอนต้น" value="2">มัธยมศึกษาตอนปลาย</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="3" selected>ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
				          	<option data-tokens="ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
						  	<option data-tokens="ปริญญาตรี" value="5">ปริญญาตรี</option>
						  	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
						  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>  
				        @elseif($l['education'] == 4)
				        	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
							<option data-tokens="มัธยมศึกษาตอนต้น" value="2">มัธยมศึกษาตอนปลาย</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="4" selected>ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
				          	<option data-tokens="ปริญญาตรี" value="5">ปริญญาตรี</option>
						  	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
						  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>   
				        @elseif($l['education'] == 5)
				        	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
							<option data-tokens="มัธยมศึกษาตอนต้น" value="2">มัธยมศึกษาตอนปลาย</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="5" selected>ปริญญาตรี</option>  
				        	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
						  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>
				        @elseif($l['education'] == 6)
				        	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
							<option data-tokens="มัธยมศึกษาตอนต้น" value="2">มัธยมศึกษาตอนปลาย</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="5">ปริญญาตรี</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="6" selected>ปริญญาโท</option>  
				        	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>
				        @elseif($l['education'] == 7)
				        	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
							<option data-tokens="มัธยมศึกษาตอนต้น" value="2">มัธยมศึกษาตอนปลาย</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="5">ปริญญาตรี</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="6">ปริญญาโท</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="7" selected>ปริญญาเอก</option>
				        @else
				        	<option value="" selected disabled>กรุณาเลือกวุฒิการศึกษา</option>
				          	<option data-tokens="มัธยมศึกษาตอนต้น" value="1">มัธยมศึกษาตอนต้น</option>
						  	<option data-tokens="มัธยมศึกษาตอนปลาย" value="2">มัธยมศึกษาตอนปลาย</option>
						  	<option data-tokens="ปวช.(ประกาศนียบัตรวิชาชีพ)" value="3">ปวช.(ประกาศนียบัตรวิชาชีพ)</option>
						  	<option data-tokens="ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)" value="4">ปวส.(ประกาศนียบัตรวิชาชีพชั้นสูง)</option>
						  	<option data-tokens="ปริญญาตรี" value="5">ปริญญาตรี</option>
						  	<option data-tokens="ปริญญาโท" value="6">ปริญญาโท</option>
						  	<option data-tokens="ปริญญาเอก" value="7">ปริญญาเอก</option>
				        @endif
					    
				        
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
					{{ form::text('n_education', $l['n_education'], ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-2">
					{{ form::label('phone','เบอร์โทรศัพท์') }}
				</div>
				<div class="col-xs-5">
					{{ form::text('phone', $l['phone'], ['class' => 'form-control']) }}
				</div>
			</div>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-xs-5">
					{{ form::submit('บันทึก',['class' => 'btn btn-primary'] ) }}
				</div>
			</div>
		</div>
	{{ Form::close() }} 
</div>		
@endforeach

@endsection