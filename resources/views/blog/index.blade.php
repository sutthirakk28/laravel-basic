@extends('layouts/main')
@section('title')

@section('content')
  <h1> Hello Blog</h1>  
  @forelse ($blog as $b)
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
            {{ $b->title }}
          </div>
          <div class="panel-body">
            {{ $b->blog_th }}
          </div>
          <div class="panel-footer text-right">
            {{ Html::link('#','Comment',array(
                'class' => 'addComment',
                'data-id' => $b->id
              )) }}
            {{ $b->created_at->diffForHumans() }}
          </div>
        </div>
      </div>
    </div>
    <!--Start Comment-->
    @forelse ($comment as $key => $c)
      @if($b->id === $c->blog_id )
        <div class="row">
          <div class="col-md-6 col-md-offset-6">
            <div class="panel panel-default">              
              <div class="panel-body">
                {{ $c->comment }}
              </div>
              <div class="panel-footer ">                
                <div class="row">
                  <div class="col-md-6 text-left">
                   By : {{ $c->user }}
                  </div>
                  <div class="col-md-6 text-right">
                   Time : {{ $c->created_at->diffForHumans() }}
                  </div>                   
                </div>
              </div>
            </div>
          </div>
        </div>
      @endif
    @empty
      
    @endforelse
  <!-- EndComment  -->
    
  @empty
    <h2>No Post!!</h2>
  @endforelse
<div class="modal fade">
  <div class="modal-dialog">
    {{ Form::open(['method' => 'post', 'action' => 'CommentController@store']) }}
    {{ Form::hidden('blog_id','',array('id' => 'id_comment')) }}
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Comment</h4>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <label for="comment">Comment</label>
          {{ Form::textarea('comment','',['class' => 'form-control']) }}
        </div>
        <div class="form-group">
          <label for="user">User</label>
          {{ Form::text('user','',['class' => 'form-control']) }}
        </div>        
      </div>
      <div class="modal-footer">
        {{ Form::submit('Save',['class' => 'btn btn-primary']) }}
      </div>
    </div><!-- .modal-content-->
    {{ Form::close() }}    
  </div>
</div>
@endsection
@endsection
