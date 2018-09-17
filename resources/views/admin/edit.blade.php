@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb">
    <a href="{{ url('/manage_Users') }}" title="กลับไปหน้าข้อมูลผู้ดูแล" class="tip-bottom">
      <i class="icon-book"></i> ข้อมูลผู้ดูแล</a>
    <a href="#">แก้ไขข้อมูลผู้ดูแล</a>
  </div>
</div> 
@endsection

@section('content')

@foreach ($user as $users)
<div class="container-fluid">
	<div class="row-fluid">
		<div class="span12">
			<div class="widget-box">
				<div class="widget-title">
					<span class="icon">
						<i class="icon-pencil"></i>									
					</span>
					<h5 class="f_th1">แบบฟอร์มแก้ไขข้อมูลฝ่าย</h5>
				</div>
				<div class="widget-content nopadding f_th3">
					{{ Form::open(['method' => 'put','route' =>['manage_Users.update', $users['id'] ],'class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate']) }}
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
		                    <label class="control-label">รหัสฝ่าย : </label>
		                    <div class="controls">
		                        {{ form::text('id_user', $users['id'], ['class' => 'f_th3', 'readonly' => 'true'] ) }}
		                    </div>
		                </div>
		                <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> ชื่อฝ่าย : </label>
		                    <div class="controls"> 
		                        {{ form::text('username',$users['name'],array('required' => 'required')) }}	                        
		                    </div>
						</div>
						<div class="control-group">
		                    <label class="control-label"><span class="request">*</span> E-mail : </label>
		                    <div class="controls">	                        
							{{ form::email('email',$users['email'],array('required' => 'required','placeholder' => 'E-mail')) }}  	                        
		                    </div>
						</div>
						<div class="control-group">
                            <label class="control-label"><span class="request">*</span> รหัสผ่านใหม่ :</label>
                            <div class="controls">
                            <input id="password" type="text" class="form-control" name="password" placeholder="รหัสผ่าน" minlength="6">
                             </div>
                        </div>
                        <div class="control-group">
		                    <label class="control-label"><span class="request">*</span> รหัสผ่านอีกครั้ง : </label>
		                    <div class="controls">	                        
							<input id="password-confirm" type="text" class="form-control" name="password_confirmation" placeholder="รหัสผ่าน" minlength="6">  	                        
                            <span class="help-block">*ต้องใส่รหัสอย่างน้อย 6 ตัว</span>    
                            </div>
						</div>
						<div class="control-group">
		                    <label class="control-label"> เบอร์โทรศัพท์ : </label>
		                    <div class="controls">	                        
							{{ form::text('phone',$users['phone'],array('placeholder' => 'เบอร์โทรศัพท์')) }}  	                        
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
@endforeach

@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script>
<script src="{{ asset('js/main/jquery.validate.js') }}"></script> 
<script src="{{ asset('js/main/maruti.form_validation.js') }}"></script>

@endsection