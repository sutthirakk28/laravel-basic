@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
	<div id="breadcrumb">
		<a href="{{ url('/pos/') }}" title="กลับไปจัดการข้อมูลตำแหน่ง" class="tip-bottom">
			<i class="icon-book"></i> ข้อมูลตำแหน่ง</a>
		<a href="#">เพิ่มข้อมูลตำแหน่ง</a>
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
					<h5 class="f_th1">แบบฟอร์มเพิ่มข้อมูลตำแหน่ง</h5>
				</div>
				<div class="widget-content nopadding f_th3">
					{{ Form::open(array('url' => url('pos'), 'class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate')) }}
					
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
		                    <label class="control-label">รหัสตำแหน่ง : </label>
		                    <div class="controls">
		                        {{ form::text('id_pos', 'อัตโนมัติ', ['class' => 'f_th3', 'readonly' => 'true']) }}
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> เลือกฝ่าย : </label>
		                    <div class="controls select2">
								<select name="name_dep" id="name_dep" required>
				                    @foreach($dep as $d)
								    <option value="{{ $d['id_dep'] }}">{{ $d['name_dep'] }}</option>
								  	@endforeach
				                </select>                        
		                    </div>
		                </div>

		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> ชื่อตำแหน่ง : </label>
		                    <div class="controls">
		                        {{ form::text('name_pos','', array('required' => 'required')) }}                        
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
@endsection