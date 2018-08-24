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
                <ul class="thumbnails">
                            <li class="span2">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox3.jpg">
                                <img src="../images/images/gallery/imgbox3.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span2">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            
                        
                            <li class="span2">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                               
                        
                            <li class="span2">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span2">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span2">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>                        
                    </ul>
                    <ul class="thumbnails">
                        
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox1.jpg">
                                <img src="../images/images/gallery/imgbox1.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox2.jpg">
                                <img src="../images/images/gallery/imgbox2.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox3.jpg">
                                <img src="../images/images/gallery/imgbox3.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox1.jpg">
                                <img src="../images/images/gallery/imgbox1.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox2.jpg">
                                <img src="../images/images/gallery/imgbox2.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox3.jpg">
                                <img src="../images/images/gallery/imgbox3.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                                <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox1.jpg">
                                <img src="../images/images/gallery/imgbox1.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox2.jpg">
                                <img src="../images/images/gallery/imgbox2.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox3.jpg">
                                <img src="../images/images/gallery/imgbox3.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                                <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox1.jpg">
                                <img src="../images/images/gallery/imgbox1.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox2.jpg">
                                <img src="../images/images/gallery/imgbox2.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox3.jpg">
                                <img src="../images/images/gallery/imgbox3.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                                <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox1.jpg">
                                <img src="../images/images/gallery/imgbox1.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox2.jpg">
                                <img src="../images/images/gallery/imgbox2.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox3.jpg">
                                <img src="../images/images/gallery/imgbox3.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox4.jpg">
                                <img src="../images/images/gallery/imgbox4.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                            <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox5.jpg">
                                <img src="../images/images/gallery/imgbox5.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                                <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox1.jpg">
                                <img src="../images/images/gallery/imgbox1.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        
                        <li class="span1">
                            <a class="thumbnail lightbox_trigger" href="../images/images/gallery/imgbox2.jpg">
                                <img src="../images/images/gallery/imgbox2.jpg" alt="" >
                            </a>
                            <div class="actions">
                                <a title="" href="#"><i class="icon-pencil icon-white"></i></a>
                                <a title="" href="#"><i class="icon-remove icon-white"></i></a>
                            </div>
                        </li>
                        </ul>
                </div>
            </div>
        </div>
    </div>
    
    
</div>
@endsection

@section('js')
@endsection
