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
		<a href="#">แก้ไขข้อมูลพนักงาน</a>
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
					<h5 class="f_th1">แบบฟอร์มแก้ไขข้อมูลพนักงาน</h5>
				</div>
				<div class="widget-content nopadding f_th3">
					@foreach($lib as $l)
				
				{{ Form::open(['method' => 'put','route' =>['lib.update', $l['id']],'files' => 'true','class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate' ]) }}		


		                <div class="control-group">
		                	@if(count($errors) > 0 )
				                <div class=" alert alert-danger">
				                    <ul>
				                        @foreach($errors->all() as $error)
				                            <li>{{ $error }}</li>
				                        @endforeach
				                    </ul>
				                </div>
				            @endif
		                    <label class="control-label"><span class="request">*</span> รหัสพนักงาน : </label>
		                    <div class="controls">
		                        {{ form::text('id_employ', $l['id_employ']) }}
		                    </div>
		                </div>
		                <div class="control-group">
			                <label class="control-label"><span class="request">*</span> รูปภาพ : </label>
			                <div class="controls">
			                  <input type="file" name="user_photo" id="user_photo" />
			                  <input type="hidden" name="user_photoOld" value="{{ $l['user_photo'] }}"/>
			                </div>
			             </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> ชื่อ-นามสกุล : </label>
		                    <div class="controls">
		                        {{ form::text('surname',$l['surname'], array('required' => 'required')) }}                  
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> ชื่อเล่น : </label>
		                    <div class="controls">
		                        {{ form::text('nickname',$l['nickname'], array('required' => 'required')) }}                  
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> วันเกิด วัน/เดือน/ปี : </label>
		                    <div class="controls">
		                        {{ form::date('age', $l['age'], array('required' => 'required')) }}                  
		                    </div>
		                </div>		                
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> เลือกตำแหน่ง : </label>
		                    <div class="controls select2">
								<select name="id_pos" id="id_pos" required>
				                    @foreach($pos as $p)
									  	@if($p['id_pos'] == $l['position'])
									  		<option value="{{ $p['id_pos'] }}" selected>{{ $p['name_pos'] }}</option>
									  	@else
									  		<option value="{{ $p['id_pos'] }}">{{ $p['name_pos'] }}</option>
									  	@endif					    
								  	@endforeach
				                </select>                        
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> วันเริ่มงาน วัน/เดือน/ปี : </label>
		                    <div class="controls">
		                        {{ form::date('job_start', $l['job_start'], array('required' => 'required')) }}                  
		                    </div>
		                </div>		                
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> เบอร์โทรศัพท์ : </label>
		                    <div class="controls">
		                        {{ form::text('phone', '0'.$l['phone'], array('required' => 'required')) }}                  
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label">เลือกวุฒิการศึกษา : </label>
		                    <div class="controls select2">
								<select name="education" id="education" required>
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
		                <div class="control-group">
		                    <label class="control-label">คณะ/สาขา : </label>
		                    <div class="controls">
		                        {{ form::text('n_education',  $l['n_education']) }}                   
		                    </div>
		                </div>
		                <div class="form-actions">
		                    {{ form::submit('Save',['class' => 'btn btn-primary'] ) }}
		                </div>
		            {{ Form::close() }}
		            @endforeach	
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