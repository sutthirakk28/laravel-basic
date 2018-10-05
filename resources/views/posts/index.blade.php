
@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon-book"></i> บทความ</a></div>
  </div>  
@endsection

@section('content')
	@if(Session::has('masupdate'))
		<div id="gritter-notify">
      <div class="normal"></div>
    </div>

	@endif
	@if(Session::has('masdelete'))		
    <div id="gritter-notify">
      <div class="sticky"></div>
    </div>
	@endif

  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title">
             <span class="icon"><i class="icon-pencil"></i></span> 
            <h5 class="f_th1">บทความทั้งหมด</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
              <tr>
                <th>Id</th>
                <th>Title</th>
                <th>Published</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($posts as $post)
                <tr>
                  <th>{{ $post['id'] }}</th>
                  <td>{{ $post['title'] }}</td>
                  <td class="center">{{ $post['published'] ? "Published" : "Draft" }}</td>
                  <td class="center"><a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Edit</a></td>
                </tr>
              @endforeach
              </tbody>
            </table>
          </div>
        </div>       
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row-fluid">
      <div class="span12">
        <a href="{{ route('posts.create') }}" class="btn btn-primary thead">เขียนบทความ</a>
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.dataTables_desc.min.js') }}"></script>
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>

<script src="{{ asset('js/main/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.interface.js') }}"></script>
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>
<script>
</script>
@endsection
