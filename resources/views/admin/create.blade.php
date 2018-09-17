@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<script src='https://www.google.com/recaptcha/api.js'></script>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/manage_Users') }}" title="กลับไปหน้าข้อมูลผู้ดูแล" class="tip-bottom">
            <i class="icon-user"></i> ข้อมูลผู้ดูแล
        </a>
        <a href="#">เพิ่มข้อมูลผู้ดูแล</a>
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
					<h5 class="f_th1">แบบฟอร์มเพิ่มข้อมูลผู้ดูแล</h5>
				</div>
				<div class="widget-content nopadding f_th3">
					{{ Form::open(array('url' => url('manage_Users'), 'class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate')) }}
					
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
		                    <label class="control-label">รหัสผู้ดูแล : </label>
		                    <div class="controls">
		                        {{ form::text('id_user', 'อัตโนมัติ', ['class' => 'f_th3','readonly' => 'true']) }}
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> ชื่อผู้ดูแล : </label>
		                    <div class="controls">	                        
							{{ form::text('username','',array('required' => 'required','placeholder' => 'ชื่อผู้ดูแล')) }}  	                        
		                    </div>
		                </div>
                        <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> E-mail : </label>
		                    <div class="controls">	                        
							{{ form::email('email','',array('required' => 'required','placeholder' => 'E-mail')) }}  	                        
		                    </div>
                        </div>
                       
                        <div class="control-group">
                            <label class="control-label"><span class="request">*</span> รหัสผ่าน :</label>
                            <div class="controls">
                            <input id="password" type="text" class="form-control" name="password" placeholder="รหัสผ่าน" minlength="6" required>
                             </div>
                        </div>
                        <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> รหัสผ่านอีกครั้ง : </label>
		                    <div class="controls">	                        
							<input id="password-confirm" type="text" class="form-control" name="password_confirmation" placeholder="รหัสผ่าน" minlength="6" required>  	                        
                            <span class="help-block">*ต้องใส่รหัสอย่างน้อย 6 ตัว</span>    
                            </div>
						</div>
						<div class="control-group">
		                    <label class="control-label"> เบอร์โทรศัพท์ : </label>
		                    <div class="controls">	                        
							{{ form::text('phone','',array('placeholder' => 'เบอร์โทรศัพท์')) }}  	                        
		                    </div>
						</div>
						<div class="control-group">
		                    <div class="controls">
							<div class="g-recaptcha" data-sitekey="6Levm3AUAAAAANy9lY37DKWcLtTuV3cO32oWs_YX"></div>    
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
<script>
$(function(){
	$('#basic_validate').submit(function(event){
		var verified = grecaptcha.getResponse();
		if(verified.lenght === 0){
			even.preventDefault();
		}
	});
});
</script>
@endsection