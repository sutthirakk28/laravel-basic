@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.container-fluid,#content-header{
   font-family: Maitree;
}

</style>
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
@endsection