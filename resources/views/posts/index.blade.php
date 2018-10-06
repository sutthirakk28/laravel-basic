
@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/Switch/lc_switch.css') }}" />
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
                  <td class="center">
                    <p id="{{ $post['id'] }}" class="published" >{{ $post['published'] ? "Published" : "Draft" }}</p>
                    <p>
                      <input type="checkbox" name="check-1" value="{{ $post['id'] }}" class="lcs_check" {{ $post['published'] ? "checked" : "" }} autocomplete="off" />
                    </p>
                  </td>
                  <td class="center">
                  <a href="{{ url('posts/'.$post['id']) }}" class="btn btn-success"><i class="icon-eye-open"></i> อ่านบทความ</a>
                  <a href="{{ route('posts.edit', $post['id']) }}" class="btn btn-warning">Edit</a>
                  </td>
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
<script src="{{ asset('js/main/Switch/lc_switch.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
      $('input').lc_switch();
  
      // triggered each time a field changes status
      $(document).on('lcs-statuschange', '.lcs_check', function() {
          var status 	= ($(this).is(':checked')) ? 'checked' : 'unchecked',
        subj 	= ($(this).attr('type') == 'radio') ? 'radio #' : 'checkbox #',
        num		= $(this).val(); 

          var id = $(this).val();
          var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
          
          $.ajax({
            type :'GET',
            url : "{{ url('/published') }}",
            data : {_token: CSRF_TOKEN,id:id,status:status},
            dataType : 'json',
            success : function(checks)
            {
              var data = checks.publish;               
              $('p#'+id).text(data)
            } 
          });
      // $('#third_div ul').prepend('<li><em>[lcs-statuschange]</em>'+ subj + num +' changed status: '+ status +'</li>');
      });
    });
</script>
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.dataTables_desc.min.js') }}"></script>
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>

<script src="{{ asset('js/main/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.interface.js') }}"></script>
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>

@endsection
