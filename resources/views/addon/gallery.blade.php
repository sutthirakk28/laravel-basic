@extends('layouts.tpm')

@section('css')
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../../public/images/img/glyphicons-halflings-white.png")
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">gallery</a>
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
                        <i class="icon-picture"></i>
                    </span>
                    <h5>Gallery</h5>
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
                            {{ Html::image('../public/images/'.$l['user_photo'], '') }}
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
                             {{ Html::image('../public/images/'.$l['user_photo'], '') }}
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
@endsection

@section('js')
@endsection
