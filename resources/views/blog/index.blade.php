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
    <div class="row">
      <div class="col-md-6 col-md-offset-6">
        <div class="panel panel-default">
          <div class="panel-heading">
          </div>
          <div class="panel-body">
          </div>
          <div class="panel-footer text-right">
          </div>
        </div>
      </div>
    </div>
  @empty
    <h2>No Post!!</h2>
  @endforelse

@endsection
@endsection
