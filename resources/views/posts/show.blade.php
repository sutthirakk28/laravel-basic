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
            <i class="icon-file"></i>
          </span>
          <h5>{{ $post->title }}</h5>          
        </div>

        <div class="widget-content nopadding">
          <div class="head">
          <h3>{{ $post->title }}</h3>
          {{ $post->updated_at->toFormattedDateString() }}
            @if ($post->published)
              <span class="label label-success" style="margin-left:15px;">Published</span>
            @else
              <span class="label label-default" style="margin-left:15px;">Draft</span>
            @endif
          </div>
            <hr />
          <div class="content">
            <p class="lead">
              {!! $post->content !!}
            </p>
          </div>
            <hr />
          <div class="foot">
            <h3>Comments:</h3>
            <div style="margin-bottom:50px;">
              <textarea class="form-control" rows="3" name="body" placeholder="แสดงความคิดเห็นของท่าน"></textarea>
              <button class="btn btn-success" style="margin-top:10px">Save Comment</button>
            </div>
            <div class="media" style="margin-top:20px;">
            <div class="media-left">
              <a href="#">
                <img class="media-object" src="http://placeimg.com/80/80" alt="...">
              </a>
            </div>
            <div class="media-body">
              <h4 class="media-heading">John Doe said...</h4>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
              </p>
              <span style="color: #aaa;">on Dec 15, 2017</span>
            </div>
          </div>
          </div>

        </div>
      
      </div>
    </div>
  </div>  
</div>
@endsection

@section('js')
@endsection