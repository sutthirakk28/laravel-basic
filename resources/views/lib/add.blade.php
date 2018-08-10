@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/colorpicke.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/datepicker.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
	<div id="breadcrumb">
		<a href="{{ url('/lib/') }}" title="กลับไปข้อมูลพนักงาน" class="tip-bottom">
			<i class="icon-book"></i> ข้อมูลพนักงาน</a>
		<a href="#">เพิ่มข้อมูลพนักงาน</a>
	</div>
</div> 
@endsection

@section('content')

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="icon-pencil"></i>									
					</span>
					<h5 class="f_th1">แบบฟอร์มเพิ่มข้อมูลพนักงาน</h5>
				</div>
				<div class="widget-content nopadding f_th3">
					{{ Form::open(array('url' => url('lib'),'files' => 'true','class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate')) }}
						@if(count($errors) > 0 )
			                <div class=" alert alert-danger">
			                    <ul>
			                        @foreach($errors->all() as $error)
			                            <li>{{ $error }}</li>
			                        @endforeach
			                    </ul>
			                </div>
			            @endif
		                <div class="control-group">
		                    <label class="control-label">*รหัสพนักงาน : </label>
		                    <div class="controls">
		                        {{ form::text('id_employ', '', array('required' => 'required')) }}
		                    </div>
		                </div>
		                <div class="control-group">
			                <label class="control-label">*รูปภาพ : </label>
			                <div class="controls">
			                  <input type="file" name="user_photo" id="user_photo" required/>
			                </div>
			             </div>
		                <div class="control-group">
		                    <label class="control-label">*ชื่อ-นามสกุล : </label>
		                    <div class="controls">
		                        {{ form::text('surname','', array('required' => 'required')) }}                  
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label">*ชื่อเล่น : </label>
		                    <div class="controls">
		                        {{ form::text('nickname','', array('required' => 'required')) }}                  
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label">*วันเกิด วัน/เดือน/ปี : </label>
		                    <div class="controls">
		                        {{ form::date('age', '', array('required' => 'required')) }}                  
		                    </div>
		                </div>		                
		                <div class="control-group">
		                    <label class="control-label">*เลือกตำแหน่ง : </label>
		                    <div class="controls select2">
								<select name="position" id="position" required>
				                    @foreach($pos as $p)
								    <option value="{{ $p['id_pos'] }}">{{ $p['name_pos'] }}</option>
								  	@endforeach
				                </select>                        
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label">*วันเริ่มงาน วัน/เดือน/ปี : </label>
		                    <div class="controls">
		                        {{ form::date('job_start', '', array('required' => 'required')) }}                  
		                    </div>
		                </div>		                
		                <div class="control-group">
		                    <label class="control-label">*เบอร์โทรศัพท์ : </label>
		                    <div class="controls">
		                        {{ form::text('phone', '', array('required' => 'required')) }}                  
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label">เลือกวุฒิการศึกษา : </label>
		                    <div class="controls select2">
								<select name="education" id="education" required>
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
		                <div class="control-group">
		                    <label class="control-label">คณะ/สาขา : </label>
		                    <div class="controls">
		                        {{ form::text('n_education', '') }}                   
		                    </div>
		                </div>
		                <div class="form-actions">
		                    {{ form::submit('Save',['class' => 'btn btn-primary'] ) }}
		                </div>
		            {{ Form::close() }}	
				</div>
			</div>			
		</div>
	</div>
</div>	

@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/main/maruti.form_validation.js') }}"></script>
<script src="{{ asset('js/main/maruti.form_common.js') }}"></script>
<script src="{{ asset('js/main/bootstrap-colorpicker.js') }}"></script>
<script src="{{ asset('js/main/bootstrap-datepicker.js') }}"></script>
@endsection