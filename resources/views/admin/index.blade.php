@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="{{ asset('css/main/uniform.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/select2.css') }}" />
<link rel="stylesheet" href="{{ asset('css/main/jquery.gritter.css') }}" />
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
  <div id="breadcrumb"> <a href="#" class="tip-bottom"><i class="icon icon-user"></i> ข้อมูลผู้ดูแล</a></div>
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
             <span class="icon"><i class="icon-th"></i></span> 
            <h5 class="f_th1">จัดการข้อมูลผู้ดูแล</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th width="100">รหัส</th>
                  <th >ชื่อผู้ดูแล</th>
                  <th >E-mail</th>
                  <th width="300">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($user as $users)
                <tr >
                  <td class="f_th2">{{ $users['id'] }}</td>
                  <td class="f_th2">
                      {{ $users['name'] }}
                  </td>
                  <td class="f_th2">
                      {{ $users['email'] }}
                  </td>
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
                        <p>เมื่อลบฝ่ายข้อมูลอาจเกิดข้อมผิดพลาดได้ <strong><var>คุณต้องการลบจริงไหม ?</var></strong></p>
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
        {{ Html::link('manage_Users/create','Add', array(  'class' => 'btn btn-primary thead')) }}
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
@endsection