@extends('layouts.tpm')

@section('css')

<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
    background-image: url("../../public/images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
    background: url("../../public/images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.fc-button-prev .fc-button-content {
    background: url("../../public/images/img/larrow.png") no-repeat scroll 15px 13px transparent;
    width: 10px;
}
.container-fluid,#content-header{
   font-family: Maitree;
}
.help-block{
    color:red;
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">จัดการข้อมูลส่วนตัว</a>
    </div>
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
                    <h5>ข้อมูลส่วนตัว</h5>
                </div>
                @foreach($profile as $profiles)
                <div class="widget-content nopadding f_th3">
                    <form action="#" method="get" class="form-horizontal">

                    <div class="control-group">
                        <label class="control-label">ชื่อ :</label>
                        <div class="controls">
                        <input type="text" placeholder="First name" value="{{$profiles['name']}}" disabled/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">E-mail :</label>
                        <div class="controls">
                        <input type="text" placeholder="Company name" value="{{$profiles['email']}}" disabled/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">รูปภาพ :</label>
                        <div class="controls">
                        <input type="file" disabled/>
                        </div>
                    </div>                     
                    <div class="control-group">
                        <label class="control-label">New Password :</label>
                        <div class="controls">
                        <input type="password" placeholder="Password" id="password" disabled>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Confirm Password :</label>
                        <div class="controls">    
                        <input type="password" placeholder="Confirm Password" id="confirm_password" disabled>
                        <span class="help-block">*ต้องใส่รหัสให้ตรงกันทั้ง 2 ช่อง</span> </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">สร้างเมื่อ :</label>
                        <div class="controls">
                        <input type="text" placeholder="Company name" value="{{$profiles['created_at']}}" disabled/>
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">แก้ไขเมื่อ :</label>
                        <div class="controls">
                        <input type="text" placeholder="Company name" value="{{$profiles['updated_at']}}" disabled/>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="pure-button btn btn-success">แก้ไข</button>
                    </div>
                    
                    </form>
                </div>
                @endforeach     
            </div>
        </div>
    </div>  
</div>
@endsection

@section('js')
<script>
    var password = document.getElementById("password"),confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("Passwords Don't Match");
        } else {
            confirm_password.setCustomValidity('');
        }
    }
    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;
</script>
@endsection