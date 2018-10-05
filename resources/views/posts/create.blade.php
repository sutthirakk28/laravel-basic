@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
	<div id="breadcrumb">
		<a href="{{ url('/posts/') }}" title="กลับไปหน้าบทความ" class="tip-bottom">
			<i class="icon-book"></i> บทความ</a>
		<a href="#">เพิ่มบทความ</a>
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
					<h5 class="f_th1">แบบฟอร์มเพิ่มบทความ</h5>
				</div>
				<div class="widget-content nopadding f_th3">
					{{ Form::open(array('url' => url('/posts'), 'class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate')) }}
						{{ csrf_field() }}
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
                <label class="control-label"><span class="request">*</span> หัวข้อบทความ : </label>
                <div class="controls">
                  <input type="text" style="width: 80%;" class="form-control" id="post_title" name="title" placeholder="Title" value="{{ old('title') }}" required />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><span class="request">*</span> เนื้อหาบทความ : </label>
                <div class="controls">	                        
                  <textarea class="form-control" style="width: 81%;" id="mytextarea" name="content" placeholder="Write something amazing..." value="{{ old('content') }}" required /></textarea>  	                        
                 
				</div>
            </div>
            <div class="control-group">
                <label class="control-label"> Published : </label>
                <div class="controls">	                        
                <input type="checkbox" name="published" style="margin-right: 15px;" />  	                        
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
<script src="{{ asset('js/main/maruti.form_validation.js') }}"></script>
<script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
<script>
  tinymce.init({
    selector: '#mytextarea',
	menubar:false, 
	theme: 'modern',
    height: 300,
	
  });
  </script>
@endsection