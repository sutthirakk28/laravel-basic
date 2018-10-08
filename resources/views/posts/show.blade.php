@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<style>
  .chat {
    list-style: none;
    margin: 0;
    padding: 0;
  }

  .chat li {
    margin-bottom: 10px;
    padding-bottom: 5px;
    border-bottom: 1px dotted #B3A9A9;
  }

  .chat li .chat-body p {
    margin: 0;
    color: #777777;
  }

  .panel-body {
    overflow-y: scroll;
    height: 350px;
  }

  ::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar {
    width: 12px;
    background-color: #F5F5F5;
  }

  ::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,.3);
    background-color: #555;
  }
</style>
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
            {{ Form::open(array('url' => url('/comments'), 'class'=>'form-horizontal', 'name'=>'basic_validate', 'novalidate'=>'novalidate', 'id'=>'basic_validate')) }}
					    {{ csrf_field() }}
              <Input type="hidden" name="post_id" value="{{$post->id}}" >
              <textarea class="form-control" rows="3" name="body" placeholder="แสดงความคิดเห็นของท่าน"></textarea>
              <button class="btn btn-success" style="margin-top:10px" type="submit" >Save Comment</button>
            {{ Form::close() }}	
            <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"></chat-messages>
                </div>
                <div class="panel-footer">
                    <chat-form
                        v-on:messagesent="addMessage"
                        :user="{{ Auth::user() }}"
                    ></chat-form>
                </div>
            </div>
        </div>
    </div>
</div>
            </div> 
              @foreach($comment as $c)
              <div class="media" style="margin-top:20px;">
                <div class="media-left">
                  <a href="#">
                    <img class="media-object" src="http://placeimg.com/80/80" alt="...">
                  </a>
                </div>
                <div class="media-body">
                  <h4 class="media-heading">{{ $c->name }} พูดว่า...</h4>
                  <p>
                    {{ $c->body }}
                  </p>
                  <span style="color: #aaa;">on {{date_format (new DateTime($c->updated_at), 'D M Y H:i')}} น.</span>              
                </div>
              </div>
              @endforeach            
          </div>

        </div>
      
      </div>
    </div>
  </div>  
</div>
@endsection

@section('js')
@endsection