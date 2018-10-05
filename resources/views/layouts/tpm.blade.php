<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">  
<head>
    <title>ระบบลางานออนไลน์</title><meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <link rel="stylesheet" href="{{ asset('css/main/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/bootstrap-responsive.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main/maruti-style.css') }}" />
    <link rel="stylesheet" class="skin-color" href="{{ asset('css/main/maruti-media.css') }}" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link href="https://fonts.googleapis.com/css?family=Taviraj:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Kanit:100,600" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Maitree:100,600" rel="stylesheet" type="text/css">

    @yield('css')
  
  @if(isset($style))
    @foreach($style as $css)
      {{ Html::style(($css)) }}
    @endforeach
  @endif
  </head>
  <body>
    
<!--Header-part-->
<div id="header">
  <h1><a href="#">TPM Admin</a></h1>
</div>
<!--close-Header-part--> 

<!--top-Header-messaages-->
<div class="btn-group rightzero"> <a class="top_message tip-left" title="Manage Files"><i class="icon-file"></i></a> <a class="top_message tip-bottom" title="Manage Users"><i class="icon-user"></i></a> <a class="top_message tip-bottom" title="Manage Comments"><i class="icon-comment"></i><span class="label label-important">5</span></a> <a class="top_message tip-bottom" title="Manage Orders"><i class="icon-shopping-cart"></i></a> </div>
<!--close-top-Header-messaages--> 

<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse"><ul class="nav">
    <li class="" ><a title="" href="{{ url('/profile') }}"><i class="icon icon-user"></i> <span class="text">ข้อมูลส่วนตัว({{ Auth::user()->name }})</span></a></li>
    <li class=" dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon-plus-sign"></i> <span class="text">การเพิ่ม</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="{{ url('/manage_Users/create') }}">เพิ่มข้อมูลผู้ดูแล</a></li>
        <li><a class="sInbox" title="" href="{{ url('/leave/create') }}">เพิ่มข้อมูลการลา</a></li>
        <li><a class="sOutbox" title="" href="{{ url('/lib/create') }}">เพิ่มพนักงาน</a></li>
        <li><a class="sTrash" title="" href="{{ url('/dep/create') }}">เพิ่มฝ่าย</a></li>
        <li><a class="sTrash" title="" href="{{ url('/pos/create') }}">เพิ่มตำแหน่ง</a></li>
      </ul>
    </li>
    <li class=""><a title="" href="{{ route('logout') }}" onclick="event.preventDefault();
             document.getElementById('logout-form').submit();"><i class="icon-off"></i> 
    <span class="text">ออกจากระบบ</span></a></li> 
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
  </ul>
</div>
<div id="search">
  <input type="text" placeholder="Search here..."/>
  <button type="submit" class="tip-left" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-Header-menu-->

  <div id="sidebar">
    <a href="#" class="visible-phone"><i class="icon icon-th-list"></i> Menu</a><ul>
    <li class="active"><a href="{{ url('/home') }}"><i class="icon icon-home"></i> <span>Home</span></a> </li>
    <li> <a href="{{ url('addon/graph') }}"><i class="icon icon-signal"></i> <span>แผนภูมิ &amp; กราฟ</span></a> </li>
    
    <li><a href="{{ url('/dep') }}"><i class="icon-book"></i> <span>ข้อมูลฝ่าย</span></a></li>
    <li><a href="{{ url('/pos') }}"><i class="icon-book"></i> <span>ข้อมูลตำแหน่ง</span></a></li>
    <li><a href="{{ url('/lib') }}"><i class="icon-user"></i> <span>ข้อมูลพนักงาน</span></a></li>
    <li><a href="{{ url('/manage_Users') }}"><i class="icon-user"></i> <span>ข้อมูลผู้ดูแล</span></a></li>
    <li><a href="{{ url('/leave/') }}"><i class="icon-flag"></i> <span>ข้อมูลการลางาน</span></a></li>
    <!-- <li> <a href="{{ url('/leave/create') }}"><i class="icon icon-pencil"></i> <span>เขียนใบลา</span></a> </li> -->
    <li><a href="{{ url('addon/apiFetchdata') }}"><i class="icon-tags"></i> <span>สรุปผลการลา(รายเดือน)</span></a></li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>Addons</span> <span class="label label-important">5</span></a>
      <ul>
        <li><a href="{{ url('/posts') }}">บทความ</a></li>
        <li><a href="{{ url('addon/gallery') }}">รูปพนักงาน</a></li>
        <li><a href="{{ url('tasks') }}">ปฎิทินบันทึกกิจกรรม</a></li>
        <li><a href="{{ url('addon/chat') }}">แจ้งเตือน LINE Notify</a></li>
        <li><a href="{{ url('addon/organiz') }}">แผนผังบริษัท</a></li>
        <li><a href="{{ url('/log-viewer') }}" target="_blank">Log File</a></li>         
      </ul>

    </li>
  </ul>    
</div>

    <div id="content">
      @yield('content-header')      
      @yield('content') 
    </div>
    
    <div class="row-fluid">
      <div id="footer" class="span12">
            &copy;
            <script>
              document.write(new Date().getFullYear())
            </script>, made with <i class="material-icons">favorite</i> by
            <a href="https://bit.ly/2LTrur8" target="_blank">Sutthirak</a> for TPM(1980) CO.,LTD.
          </div>
    </div>          

      <script src="{{ asset('js/main/jquery.min.js') }}"></script>
      <script src="{{ asset('js/main/jquery.ui.custom.js') }}"></script>
      <script src="{{ asset('js/main/bootstrap.min.js') }}"></script>
      <script src="{{ asset('js/main/maruti.js') }}"></script>
       @yield('js')

      @if(isset($script))
        @foreach($script as $js)
          {{ Html::script(($js)) }}
        @endforeach
      @endif      
  </body>

</html>
