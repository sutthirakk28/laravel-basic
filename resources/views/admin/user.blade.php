@extends('layouts.tpm')

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
.container-fluid,#content-header{
   font-family: Maitree;
}



.snip1515 {
  font-family: 'Open Sans', Arial, sans-serif;
  position: relative;
  float: left;
  margin: 10px 1%;
  min-width: 230px;
  max-width: 315px;
  width: 100%;
  color: #000000;
  text-align: center;
  line-height: 1.4em;
  font-size: 14px;
  box-shadow: none !important;
}

.snip1515 * {
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

.snip1515 .profile-image {
  display: inline-block;
  width: 80%;
  z-index: 1;
  position: relative;
  padding: 10px;
  /* border: 2px solid #3a87ad; */
  border: 2px solid #fff;
  background: linear-gradient(to bottom,#f9aa81 , #c9fcd7, #e4e7aa);
}

.snip1515 .profile-image img {
  max-width: 100%;
  vertical-align: top;
}

.snip1515 figcaption {
  width: 100%;
  /* background-color: #fffcfc; */
  background: linear-gradient(to bottom, #c6ffdd, #fbd786, #f7797d);
  color: #555;
  padding: 125px 25px 25px;
  margin-top: -100px;
  display: inline-block;
}

.snip1515 h3,
.snip1515 h4,
.snip1515 p {
  margin: 0 0 5px;
}

.snip1515 h3 {
  font-weight: 600;
  font-size: 1.3em;
  font-family: Maitree;
}

.snip1515 h4 {
  color: #8c8c8c;
  font-weight: 400;
  letter-spacing: 2px;
}

.snip1515 p {
  font-size: 0.9em;
  letter-spacing: 1px;
  opacity: 0.9;
}

.snip1515 .icons {
  text-align: center;
  width: 100%;
}

.snip1515 i {
  padding: 10px 2px;
  display: inline-block;
  font-size: 18px;
  font-weight: normal;
  color: #e8b563;
  opacity: 0.75;
}

.snip1515 i:hover {
  opacity: 1;
  -webkit-transition: all 0.35s ease;
  transition: all 0.35s ease;
}

.image{
    width : 300px; 
    height : 180px;
}
.fa {
  padding: 20px;
  font-size: 30px;
  width: 30px;
  text-align: center;
  text-decoration: none;
  margin: 5px 2px;
  border-radius: 50%;
}

.fa:hover {
    opacity: 0.7;
}

.fa-facebook,.fa-twitter,.fa-google,.fa-youtube,.fa-instagram {
  color: white;
}


</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">ข้อมูลผู้ดูแล</a>
    </div>
    <h1>ข้อมูลผู้ดูแลทั้งหมด</h1>  
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
            @foreach($user as $users)
            <figure class="snip1515">
                <div class="profile-image">{{ Html::image('images/admin/admin.jpg', 'adminteam', array('class' => 'image')) }}</div>
                
                <figcaption>
                    <h3>{{$users['name']}}   <span class="label label-info">MASTER</span></h3>
                    <h4>{{$users['email']}}</h4>
                    <p>สร้างเมื่อ : {{$users['created_at']}}</p>
                    <p>แก้ไขเมื่อ : {{$users['updated_at']}}</p>
                    <div class="icons">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-twitter"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-youtube"></a>
                    <a href="#" class="fa fa-google"></a>
                    </div>
                </figcaption>
            </figure>
            @endforeach            
            </div>
        </div>
    </div>  
</div>
@endsection

@section('js')
<script >
    /* Demo purposes only */
$(".hover").mouseleave(
  function () {
    $(this).removeClass("hover");
  }
);

</script>
@endsection