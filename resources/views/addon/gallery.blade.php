@extends('layouts.tpm')

@section('css')
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../images/img/glyphicons-halflings-white.png")
}
#login-cloak {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  z-index: 100;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
}
#login-cloak .left-pane {
  position: relative;
  background: #f6f6f6;
  border-right: 15px solid #fafafa;
  width: 30%;
  min-width: 300px;
  -webkit-box-flex: 1 auto;
  -moz-box-flex: 1 auto;
  -webkit-flex: 1 auto;
  -ms-flex: 1 auto;
  flex: 1 auto;
  -webkit-box-ordinal-group: 0;
  -moz-box-ordinal-group: 0;
  -ms-flex-order: 0;
  -webkit-order: 0;
  order: 0;
  transition-duration: 700ms;
}
#login-cloak .left-pane.open {
  width: 0;
  transition-duration: 700ms;
  min-width: 0;
  margin-left: -200px;
}
#login-cloak .left-pane:after {
  position: absolute;
  content: " ";
  top: 0;
  bottom: 0;
  right: 0;
  width: 1px;
  background: #b2b2b2;
}
#login-cloak .left-pane .keyhole {
  width: 150px;
  height: 150px;
  border: 1px solid #b2b2b2;
  border-radius: 50%;
  background: #fff;
  position: absolute;
  top: 40%;
  right: -90px;
  z-index: 100;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  justify-content: center;
}
#login-cloak .left-pane .keyhole .outer-circle {
  -webkit-box-flex: 1 auto;
  -moz-box-flex: 1 auto;
  -webkit-flex: 1 auto;
  -ms-flex: 1 auto;
  flex: 1 auto;
  -webkit-box-ordinal-group: 0;
  -moz-box-ordinal-group: 0;
  -ms-flex-order: 0;
  -webkit-order: 0;
  order: 0;
  max-width: 125px;
  height: 125px;
  margin: auto;
  border: 1px solid #b2b2b2;
  border-radius: 50%;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  justify-content: center;
  background: #28d7ff;
  /* Old browsers */
  background: -moz-linear-gradient(top, #28d7ff 19%, #2ba3d7 52%, #3c8bc2 90%);
  /* FF3.6+ */
  background: -webkit-gradient(linear, left top, left bottom, color-stop(19%, #28d7ff), color-stop(52%, #2ba3d7), color-stop(90%, #3c8bc2));
  /* Chrome,Safari4+ */
  background: -webkit-linear-gradient(top, #28d7ff 19%, #2ba3d7 52%, #3c8bc2 90%);
  /* Chrome10+,Safari5.1+ */
  background: -o-linear-gradient(top, #28d7ff 19%, #2ba3d7 52%, #3c8bc2 90%);
  /* Opera 11.10+ */
  background: -ms-linear-gradient(top, #28d7ff 19%, #2ba3d7 52%, #3c8bc2 90%);
  /* IE10+ */
  background: linear-gradient(to bottom, #28d7ff 19%, #2ba3d7 52%, #3c8bc2 90%);
  /* W3C */
  filter: progid:DXImageTransform.Microsoft.gradient( startColorstr="#28d7ff", endColorstr="#5f7bc2", GradientType=0 );
  /* IE6-9 */
}
#login-cloak .left-pane .keyhole .outer-circle .inner-circle {
  -webkit-box-flex: 1 100%;
  -moz-box-flex: 1 100%;
  -webkit-flex: 1 100%;
  -ms-flex: 1 100%;
  flex: 1 100%;
  -webkit-box-ordinal-group: 0;
  -moz-box-ordinal-group: 0;
  -ms-flex-order: 0;
  -webkit-order: 0;
  order: 0;
  max-width: 100px;
  height: 100px;
  background: #f6f6f6;
  margin: auto;
  border: 1px solid #b2b2b2;
  border-radius: 50%;
  display: -webkit-box;
  display: -moz-box;
  display: -ms-flexbox;
  display: -webkit-flex;
  display: flex;
  justify-content: center;
}
#login-cloak .left-pane .keyhole .outer-circle .inner-circle .rect {
  position: relative;
  -webkit-box-flex: 1 auto;
  -moz-box-flex: 1 auto;
  -webkit-flex: 1 auto;
  -ms-flex: 1 auto;
  flex: 1 auto;
  -webkit-box-ordinal-group: 0;
  -moz-box-ordinal-group: 0;
  -ms-flex-order: 0;
  -webkit-order: 0;
  order: 0;
  max-width: 20px;
  height: 70px;
  background: #666666;
  margin: auto;
  -webkit-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.8);
  -moz-box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.8);
  box-shadow: inset 0 0 10px rgba(0, 0, 0, 0.8);
  transition-duration: 1s;
}
#login-cloak .left-pane .keyhole .outer-circle .inner-circle .rect:after {
  content: " ";
  position: absolute;
  top: 20px;
  left: 0;
  width: 0;
  height: 0;
  border: 5px solid rgba(0, 0, 0, 0);
  border-left-color: #f6f6f6;
}
#login-cloak .left-pane .keyhole .outer-circle .inner-circle .rect:before {
  content: " ";
  position: absolute;
  bottom: 25px;
  right: 0;
  width: 0;
  height: 0;
  border: 5px solid rgba(0, 0, 0, 0);
  border-right-color: #f6f6f6;
}
#login-cloak .left-pane .keyhole .outer-circle .inner-circle .rect.open {
  transform: rotate(180deg);
  transition-duration: 1s;
}
#login-cloak .middle-pane {
  width: 0;
  max-width: 0;
  background: rgba(0, 0, 0, 0);
  border-left: 1px solid #b2b2b2;
  border-right: 1px solid #b2b2b2;
  -webkit-box-flex: 1 auto;
  -moz-box-flex: 1 auto;
  -webkit-flex: 1 auto;
  -ms-flex: 1 auto;
  flex: 1 auto;
  -webkit-box-ordinal-group: 1;
  -moz-box-ordinal-group: 1;
  -ms-flex-order: 1;
  -webkit-order: 1;
  order: 1;
  transition-duration: 700ms;
}
#login-cloak .middle-pane.open {
  width: 150%;
  max-width: 150%;
  transition-duration: 700ms;
}
#login-cloak .right-pane {
  background: #f6f6f6;
  border-left: 15px solid #fafafa;
  position: relative;
  width: 70%;
  -webkit-box-flex: 1 auto;
  -moz-box-flex: 1 auto;
  -webkit-flex: 1 auto;
  -ms-flex: 1 auto;
  flex: 1 auto;
  -webkit-box-ordinal-group: 2;
  -moz-box-ordinal-group: 2;
  -ms-flex-order: 2;
  -webkit-order: 2;
  order: 2;
  transition-duration: 700ms;
}
#login-cloak .right-pane.open {
  transition-duration: 700ms;
  width: 0;
  margin-right: -200px;
}
#login-cloak .right-pane:before {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  width: 1px;
  content: " ";
  background: #b2b2b2;
}

button.toggle {
  position: absolute;
  z-index: 999;
  bottom: 40px;
  right: 40px;
  width: 100px;
  height: 40px;
  background: #0096c5;
  border: none;
  color: #fff;
  border-radius: 4px;
  font-size: 16px;
  cursor: pointer;
  margin-bottom: 20px;
}
button.toggle:hover {
  background: #0083ac;
}

.content {
  border: 1px solid #ccc;
  width: 600px;
  margin: auto;
  padding: 10px;
  background: #f0f0f0;
}

</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">รูปพนักงาน</a>
    </div>
</div>
@endsection
@section('content')
<div id="login-cloak">

    <div class="left-pane">
        <div class="keyhole">
            <div class="outer-circle">
              <div class="inner-circle">
                              <div class="rect"></div>
              </div>

            </div>
        </div>
    </div>
    <div class="middle-pane"></div>
    <div class="right-pane"></div>
</div>

<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title">
                    <span class="icon">
                        <i class="icon-picture"></i>
                    </span>
                    <h5>รูปพนักงาน</h5>
                </div>
                <div class="widget-content">
                @php
                    $count = 0;
                @endphp
                <ul class="thumbnails">
                @foreach($lib as $l)
                    @php $name = explode(" ",$l['surname']); @endphp
                    @if($count <= 5)
                    <li class="span2">
                        <a class="thumbnail lightbox_trigger" href="{{URL::asset('../public/images/'.$l['user_photo'])}}">
                            {{ Html::image('../images/'.$l['user_photo'], '') }}
                            {{ $l['surname'] }}
                        </a>
                        <div class="actions">
                            <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                            <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                        </div>
                    </li>                    
                    @php $count += 1; @endphp
                    @else
                    <li class="span1">
                        <a class="thumbnail lightbox_trigger" href="{{URL::asset('../public/images/'.$l['user_photo'])}}">
                             {{ Html::image('../images/'.$l['user_photo'], '') }}
                            <span class="show_name">{{ $name[0] }}</span>
                        </a>
                        <div class="actions">
                            <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                            <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                        </div>
                    </li>
                    @endif
                @endforeach
                </ul>   
                </div>
            </div>
        </div>
    </div>
    
    
</div>
<button class="toggle">เปิดดูข้อมูล</button>

@endsection

@section('js')
<script type="text/javascript">
function open() {
  $("#login-cloak .keyhole .rect").addClass("open");

  setTimeout(function() {
    $("#login-cloak .left-pane").addClass("open");
    $("#login-cloak .middle-pane").addClass("open");
    $("#login-cloak .right-pane").addClass("open");
  }, 1000);
}

function close() {
  setTimeout(function() {
    $("#login-cloak .keyhole .rect").removeClass("open");
  }, 1000);
  $("#login-cloak .left-pane").removeClass("open");
  $("#login-cloak .middle-pane").removeClass("open");
  $("#login-cloak .right-pane").removeClass("open");
}

$("button.toggle").click(function() {
  if ($("#login-cloak .left-pane").hasClass("open")) {
    close();
    $('button.toggle').html('เปิดดูข้อมูล');
  } else {
    open();
    $('button.toggle').html('ล็อค');
  }
});
</script>
@endsection
