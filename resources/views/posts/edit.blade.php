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
		<a href="#">แก้ไขบทความ</a>
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
          {{ Form::open(['method' => 'put','route' =>['posts.update',$post->id ],'class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate']) }}
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
                  <input type="text" style="width: 80%;" class="form-control" id="post_title" name="title" placeholder="Title" value="{{ $post->title }}" required />
                </div>
            </div>
            <div class="control-group">
							<label class="control-label"><span class="request">*</span> เนื้อหาบทความ : </label>
							<div class="controls">              	                        
								<textarea class="form-control" style="width: 81%;" id="mytextarea" name="content" placeholder="Write something amazing..." value="{{ old('content') }}" required />{{ $post->content }}</textarea>  	                        
							</div>
            </div>
            <div class="control-group">
                <label class="control-label"> Published : </label>
                <div class="controls">	                        
                <input type="checkbox" name="published" style="margin-right: 15px;" {{ $post->published ? "checked" : '' }}/>  	                        
                </div>
            </div>            
            {{ Form::close() }}
            <div class="form-actions">
              <button onclick="event.preventDefault();
              document.getElementById('basic_validate').submit();" class="btn btn-primary">Save</button>
              <a href="#myAlert" data-toggle="modal" data-id="{{ $post->id }}" class="addDialog btn btn-danger">Delete</a>	                
	                <!--modal delete -->
	                <div id="myAlert" class="modal hide">
	                  <div class="modal-header">
	                    <button data-dismiss="modal" class="close" type="button">×</button>
	                    <h3><i class="material-icons" style="font-size:15px;color:red">error_outline</i> คำเตือน! </h3>
	                  </div>
	                  <div class="modal-body">
	                    <p>เมื่อลบข้อมูลอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
	                  </div>
	                  <div class="modal-footer">
	                    {{ Form::open(['route' => ['posts.destroy',$post->id, 'method' => 'DELETE'] ]) }}
	                      {{ csrf_field() }}
                        {{ method_field('delete') }} 
	                    {{ Form::submit('Confirm',array('class' => 'btn btn-primary')) }}
	                    <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
	                    {{ Form::close()}} 
	                    
	                  </div>
	                </div>
	                <!--end modal delete -->
            </div>
            
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
