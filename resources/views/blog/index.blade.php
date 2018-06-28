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
              <div class="panel-footer text-right">
                {{ $c->created_at->diffForHumans() }}
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

@endsection
@endsection
