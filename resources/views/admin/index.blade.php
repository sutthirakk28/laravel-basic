@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
  tr.focus {
    box-shadow: 0 0 5px rgba(81, 203, 238, 1);
    border: 1px solid rgba(81, 203, 238, 1);
  }
  button#send_sms,button#send_mail {
    /* font-size: 10px;
    padding: 1px; */
    border-radius: 4px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon icon-user" ></i> ข้อมูลผู้ดูแล</a></div>
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
             <span class="icon"><i class="fa fa-address-book-o" style="font-size:18px"></i></span> 
            <h5 class="f_th1">จัดการข้อมูลผู้ดูแล</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="100">รหัส</th>
                  <th >ชื่อผู้ดูแล</th>
                  <th >E-mail</th>
                  <th >ระดับ</th>
                  <th >เบอร์โทรศัพท์</th>
                  @if(Auth::user()->type === 1 )
                    <th width="300">Action</th>
                  @endif
                  
                </tr>
                
              </thead>
              <tbody>
                @foreach ($user as $users)
                @if($users['id'] == Auth::id())
                <tr class="focus">
                @else
                <tr>
                @endif
                  <td class="f_th2">{{ $users['id'] }}</td>
                  <td class="f_th2">
                      {{ $users['name'] }}
                  </td>
                  <td class="f_th2">
                      {{ $users['email'] }}
                      @if(Auth::user()->type === 1)
                      <button type="button" class="btn btn-primary btn-mini" value="{{ $users['id'] }}" id="send_mail">ส่ง E-mail  <i class="fa fa-paper-plane-o" style="font-size:14px;color:white"></i></button>
                      @endif
                  </td>
                  <td class="f_th2">
                      @if($users['type'] == 1)
                      <span class="label label-success"> Director </span>
                      @else
                      <span class="label label-info">Administrator</span>
                      @endif
                  </td>
                  <td class="f_th2">
                      @if($users['phone'] != '')                        
                        {{ $users['phone'] }}
                        @if(Auth::user()->type === 1)                        
                        <button type="button" class="btn btn-primary btn-mini" value="{{ $users['id'] }}" id="send_sms">ส่ง SMS  <i class="fa fa-mobile-phone" style="font-size:18px;color:white"></i></button>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        @endif
                      @else

                      @endif                      
                  </td>
                  @if(Auth::user()->type === 1 )
                    <td class="center">                                        
                    {{ Html::link('manage_Users/'.$users['id'], 'View', array('class' => 'btn btn-success')) }}
                    {{ Html::link('manage_Users/'.$users['id'].'/edit','Edit', array('class' => 'btn btn-warning')) }}                   
                    <a href="#myAlert" data-toggle="modal" data-id="{{$users['id']}}" class="addDialog btn btn-danger">Delete</a>
                    
                    <!--modal delete -->
                    <div id="myAlert" class="modal hide">
                      <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button">×</button>
                        <h3><i class="material-icons" style="font-size:15px;color:red">error_outline</i> คำเตือน! </h3>
                      </div>
                      <div class="modal-body">
                        <p>เมื่อลบข้อมูลผู้ดูแลอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
                      </div>
                      <div class="modal-footer">
                        {{ Form::open(['route' => ['manage_Users.destroy',$users['id'], 'method' => 'DELETE'] ]) }}
                        <input type="hidden" name="_method" value="delete"/>
                        <input type="hidden" name="depId" value="" id="depId"> 
                        {{ Form::submit('Confirm',array('class' => 'btn btn-primary')) }}
                        <a data-dismiss="modal" class="btn" href="#">Cancel</a> 
                        {{ Form::close()}} 
                        
                      </div>
                    </div>
                    <!--end modal delete -->
                  </td>
                  @endif
                  
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
        @if(Auth::user()->type === 1 )
          {{ Html::link('manage_Users/create','Add', array(  'class' => 'btn btn-primary thead')) }}
        @endif
      </div>
    </div>
  </div>
@endsection

@section('js')
<script src="{{ asset('js/main/jquery.uniform.js') }}"></script>
<script src="{{ asset('js/main/select2.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.dataTables.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.tables.js') }}"></script>

<script src="{{ asset('js/main/jquery.gritter.min.js') }}"></script> 
<script src="{{ asset('js/main/jquery.peity.min.js') }}"></script> 
<script src="{{ asset('js/main/maruti.interface.js') }}"></script>
<script src="{{ asset('js/main/maruti.popover.js') }}"></script>
<script>
$(document).ready(function(){

  $('#send_sms').live('click', function(event){
    event.preventDefault();
    var id = $(this).val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    
    $.ajax({
      type :'POST',
      url : "{{ url('/nexmo') }}",
      data : {_token: CSRF_TOKEN,id:id},
      dataType : 'json',
      success : function(student)
      {
        var data = student.nexmo;        
        console.log(data);
        alert(data);
      } 
    });
  });

  $('#send_mail').live('click', function(event){
    event.preventDefault();
    var id = $(this).val();
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    console.log(id);
    $.ajax({
      type :'GET',
      url : "{{ url('/sendattachmentemail') }}",
      data : {_token: CSRF_TOKEN,id:id},
      dataType : 'json',
      success : function(student)
      {
        var data = student.email;        
        console.log(data);
        alert(data);        
        
      } 
    });
  });
  
});

$(document).on("click", ".addDialog", function () {
     var myBookId = $(this).data('id');
     $(".modal-footer #depId").val( myBookId );       
});

</script>
@endsection