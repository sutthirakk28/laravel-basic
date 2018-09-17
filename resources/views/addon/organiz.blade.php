@extends('layouts.tpm')

@section('css')
<style type="text/css">
[class^="icon-"], [class*=" icon-"] {    
    background-image: url("../../public/images/img/glyphicons-halflings.png");
}
.icon-white, .nav-pills>.active>a>[class^="icon-"], .nav-pills>.active>a>[class*=" icon-"], .nav-list>.active>a>[class^="icon-"], .nav-list>.active>a>[class*=" icon-"], .navbar-inverse .nav>.active>a>[class^="icon-"], .navbar-inverse .nav>.active>a>[class*=" icon-"], .dropdown-menu>li>a:hover>[class^="icon-"], .dropdown-menu>li>a:focus>[class^="icon-"], .dropdown-menu>li>a:hover>[class*=" icon-"], .dropdown-menu>li>a:focus>[class*=" icon-"], .dropdown-menu>.active>a>[class^="icon-"], .dropdown-menu>.active>a>[class*=" icon-"], .dropdown-submenu:hover>a>[class^="icon-"], .dropdown-submenu:focus>a>[class^="icon-"], .dropdown-submenu:hover>a>[class*=" icon-"], .dropdown-submenu:focus>a>[class*=" icon-"] {
  background-image: url("../images/img/glyphicons-halflings-white.png")
}
.fc-button-next .fc-button-content {
  background: url("../images/img/rarrow.png") no-repeat scroll 15px 13px transparent;
  width: 10px;
}
.fc-button-prev .fc-button-content {
  background: url("../images/img/larrow.png") no-repeat scroll 15px 13px transparent;
  width: 10px;
}

*,
*:before,
*:after {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}


#wrapper {
    margin-left: auto;
    margin-right: auto;
    max-width: 100em;
}

#container {
    float: left;
    padding: 1em;
    width: 100%;
    font-size:5px;
}

ol.organizational-chart,
ol.organizational-chart ol,
ol.organizational-chart li,
ol.organizational-chart li > div {
    position: relative;
}

ol.organizational-chart,
ol.organizational-chart ol {
    list-style: none;
    margin: 0;
    padding: 0;
}

ol.organizational-chart {
    text-align: center;
}

ol.organizational-chart ol {
    padding-top: 1em;
}

ol.organizational-chart ol:before,
ol.organizational-chart ol:after,
ol.organizational-chart li:before,
ol.organizational-chart li:after,
ol.organizational-chart > li > div:before,
ol.organizational-chart > li > div:after {
    background-color: #b7a6aa;
    content: '';
    position: absolute;
}

ol.organizational-chart ol > li {
    padding: 1em 0 0 1em;
}

ol.organizational-chart > li ol:before {
    height: 1em;
    left: 50%;
    top: 0;
    width: 3px;
}

ol.organizational-chart > li ol:after {
    height: 3px;
    left: 3px;
    top: 1em;
    width: 50%;
}

ol.organizational-chart > li ol > li:not(:last-of-type):before {
    height: 3px;
    left: 0;
    top: 2em;
    width: 1em;
}

ol.organizational-chart > li ol > li:not(:last-of-type):after {
    height: 100%;
    left: 0;
    top: 0;
    width: 3px;
}

ol.organizational-chart > li ol > li:last-of-type:before {
    height: 3px;
    left: 0;
    top: 2em;
    width: 1em;
}

ol.organizational-chart > li ol > li:last-of-type:after {
    height: 2em;
    left: 0;
    top: 0;
    width: 3px;
}

ol.organizational-chart li > div {
    background-color: #fff;
    border-radius: 3px;
    min-height: 2em;
    padding: 0.5em;
}

/*** PRIMARY ***/
ol.organizational-chart > li > div {
    background-color: #a2ed56;
    margin-right: 1em;
}

ol.organizational-chart > li > div:before {
    bottom: 2em;
    height: 3px;
    right: -1em;
    width: 1em;
}

ol.organizational-chart > li > div:first-of-type:after {
    bottom: 0;
    height: 2em;
    right: -1em;
    width: 3px;
}

ol.organizational-chart > li > div + div {
    margin-top: 1em;
}

ol.organizational-chart > li > div + div:after {
    height: calc(100% + 1em);
    right: -1em;
    top: -1em;
    width: 3px;
}

/*** SECONDARY ***/
ol.organizational-chart > li > ol:before {
    left: inherit;
    right: 0;
}

ol.organizational-chart > li > ol:after {
    left: 0;
    width: 100%;
}

ol.organizational-chart > li > ol > li > div {
    background-color: #83e4e2;
}

/*** TERTIARY ***/
ol.organizational-chart > li > ol > li > ol > li > div {
    background-color: #fd6470;
}

/*** QUATERNARY ***/
ol.organizational-chart > li > ol > li > ol > li > ol > li > div {
    background-color: #fca858;
}

/*** QUINARY ***/
ol.organizational-chart > li > ol > li > ol > li > ol > li > ol > li > div {
    background-color: #fddc32;
}

/*** MEDIA QUERIES ***/
@media only screen and ( min-width: 64em ) {

    ol.organizational-chart {
        margin-left: -1em;
        margin-right: -1em;
    }

    /* PRIMARY */
    ol.organizational-chart > li > div {
        display: inline-block;
        float: none;
        margin: 0 1em 1em 1em;
        vertical-align: bottom;
    }

    ol.organizational-chart > li > div:only-of-type {
        margin-bottom: 0;
        width: calc((100% / 1) - 2em - 4px);
    }

    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(2),
    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(2) ~ div {
        width: calc((100% / 2) - 2em - 4px);
    }

    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(3),
    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(3) ~ div {
        width: calc((100% / 3) - 2em - 4px);
    }

    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(4),
    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(4) ~ div {
        width: calc((100% / 4) - 2em - 4px);
    }

    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(5),
    ol.organizational-chart > li > div:first-of-type:nth-last-of-type(5) ~ div {
        width: calc((100% / 5) - 2em - 4px);
    }

    ol.organizational-chart > li > div:before,
    ol.organizational-chart > li > div:after {
        bottom: -1em!important;
        top: inherit!important;
    }

    ol.organizational-chart > li > div:before {
        height: 1em!important;
        left: 50%!important;
        width: 3px!important;
    }

    ol.organizational-chart > li > div:only-of-type:after {
        display: none;
    }

    ol.organizational-chart > li > div:first-of-type:not(:only-of-type):after,
    ol.organizational-chart > li > div:last-of-type:not(:only-of-type):after {
        bottom: -1em;
        height: 3px;
        width: calc(50% + 1em + 3px);
    }

    ol.organizational-chart > li > div:first-of-type:not(:only-of-type):after {
        left: calc(50% + 3px);
    }

    ol.organizational-chart > li > div:last-of-type:not(:only-of-type):after {
        left: calc(-1em - 3px);
    }

    ol.organizational-chart > li > div + div:not(:last-of-type):after {
        height: 3px;
        left: -2em;
        width: calc(100% + 4em);
    }

    /* SECONDARY */
    ol.organizational-chart > li > ol {
        display: flex;
        flex-wrap: nowrap;
    }

    ol.organizational-chart > li > ol:before,
    ol.organizational-chart > li > ol > li:before {
        height: 1em!important;
        left: 50%!important;
        top: 0!important;
        width: 3px!important;
    }

    ol.organizational-chart > li > ol:after {
        display: none;
    }

    ol.organizational-chart > li > ol > li {
        flex-grow: 1;
        padding-left: 1em;
        padding-right: 1em;
        padding-top: 1em;
    }

    ol.organizational-chart > li > ol > li:only-of-type {
        padding-top: 0;
    }

    ol.organizational-chart > li > ol > li:only-of-type:before,
    ol.organizational-chart > li > ol > li:only-of-type:after {
        display: none;
    }

    ol.organizational-chart > li > ol > li:first-of-type:not(:only-of-type):after,
    ol.organizational-chart > li > ol > li:last-of-type:not(:only-of-type):after {
        height: 3px;
        top: 0;
        width: 50%;
    }

    ol.organizational-chart > li > ol > li:first-of-type:not(:only-of-type):after {
        left: 50%;
    }

    ol.organizational-chart > li > ol > li:last-of-type:not(:only-of-type):after {
        left: 0;
    }

    ol.organizational-chart > li > ol > li + li:not(:last-of-type):after {
        height: 3px;
        left: 0;
        top: 0;
        width: 100%;
    }
}
.container-fluid,#content-header{
   font-family: Maitree;
}
h1 {
    text-align: center;
    font-size: 25px;
}
h2 {
    font-size: 20px;
    text-align: center;
}
h3 {
    font-size: 17px;
    text-align: center;
}
h4 {
    font-size: 14px;
    text-align: center;
}
#container div {
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    font-size:7px;
    
}
</style>
@endsection

@section('content-header')
<div id="content-header">
    <div id="breadcrumb"> 
        <a href="{{ url('/home') }}" title="กลับไปหน้าแรก" class="tip-bottom">
            <i class="icon-home"></i> Home
        </a>
        <a href="#">แผนผังโครงสร้างองค์กร</a>
    </div>
    <h1>แผนผังองค์กร บริษัท ทีพีเอ็ม (1980) จำกัด
</h1>  
</div>
@endsection

@section('content')
<div class="container-fluid">
    <div class="row-fluid">
        <div class="span12">
            <div class="widget-box">
                

<div id="wrapper">
    <div id="container">

        <ol class="organizational-chart">
            <li>
                <div>
                
                    <h1> ประธานบริหาร </h1>
                    {{ Html::image('../images/org_man1.png', 'alt', array( 'width' => 40, 'height' => 40 )) }}
                    WEI BIN
                </div>
                <div>
                    <h1>กรรมการบริหาร </h1>
                    {{ Html::image('../images/org_man1.png', 'alt', array( 'width' => 40, 'height' => 40 )) }}
                    WEI BO   
                </div>
                <ol>
                <li>
                    <div>
                        <h2>ฝ่ายบุคคล</h2>
                    </div>
                    <ol>
                        <li>
                            <div>
                                <h3>หัวหน้าฝ่ายบุคคล</h3>
                            </div>
                            <ol>
                                <li>
                                    <div>
                                        <h4>เจ้าหน้าที่ฝ่ายบุคคล</h4> 
                                        {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                        เกศสุดา  อาสสุวรรณ์   
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h4>ล่ามภาษาจีน  </h4>
                                        {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                        ณิชยา ดีศิริ     
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h4>เจ้าหน้าที่รักษาความปลอดภัย  </h4>
                                        {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                        สายันห์  แซ่หยาง      
                                    </div>
                                </li>
                                <li>
                                    <div>
                                        <h4>เจ้าหน้าที่ทำความสะอาด  </h4>
                                        {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                        จำเรียง  เจกะเกตุ    
                                    </div>
                                </li>
                            </ol>
                        </li>
                    </ol>
                </li>
                    <li>
                        <div>
                            <h2>ฝ่ายการเงิน</h2>
                        </div>
                        <ol>
                            <li>
                                <div>
                                    <h3>หัวหน้าฝ่ายการเงิน</h3>
                                    {{ Html::image('../images/org_wow1.png', 'alt', array( 'width' => 33, 'height' => 33 )) }}
                                    สุพัตรา ผิวอ่อน 
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการเงิน </h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            ธนัช  จินตนาวิลาศ  
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการเงิน</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            ภรมล  งามฉวี
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการเงิน</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            แพรวพรรณ บุญนุกุล
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <div>
                            <h2>ฝ่ายบริการหลังการขาย</h2>
                        </div>
                        <ol>
                            <li>
                                <div>
                                    <h3>หัวหน้าฝ่ายหลังการขาย </h3>
                                    {{ Html::image('../images/org_man3.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                    พิชิต วงศ์ศรีเทพ
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายหลังการขาย</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            พิมพ์พิไล งามแสง
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายหลังการขาย</h4>
                                            {{ Html::image('./images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สมชัย ทองหล่อ 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายหลังการขาย</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สมชัย บุตรใส 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายหลังการขาย</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            ณดล แดงบรรจง 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายหลังการขาย</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            ชาย กาลพฤกษ์ 
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <div>
                            <h2>ฝ่ายติดตั้ง</h2>
                        </div>
                        <ol>
                            <li>
                                <div>
                                    <h3>หัวหน้าฝ่ายติดตั้ง</h3>
                                    {{ Html::image('../images/org_man3.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                    วิทวัส  บุญยงค์ 
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายติดตั้ง</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            วันชัย คุชิตา
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายติดตั้ง</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            มงคล ใจสุข
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายติดตั้ง</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สุชิน บุญคำ
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายติดตั้ง</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            ไพรวัลย์ ชัยพร
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายติดตั้ง</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สรศักดิ์ แซ่ตั้ง
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายติดตั้ง</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สิงห์นาท บัวกลาง
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <div>
                            <h2>ฝ่ายคลังสินค้า</h2>
                        </div>
                        <ol>
                            <li>
                                <div>
                                    <h3>หัวหน้าฝ่ายคลังสินค้า</h3>
                                    {{ Html::image('../images/org_man3.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                    อับดุลเลาะ  วาโร๊ะ
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่คลังสินค้า</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            แพรวรุ่ง  เลื้อยไธสง 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่คลังสินค้า</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            วีระพล  นาระถี
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่คลังสินค้า</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            ประวิทย์  บุญวงค์ 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่คลังสินค้า</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            บรรลังฤทธิ์ วงค์เหมาะ
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่คลังสินค้า</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            กิตติศักดิ์ กันทะวงศ์
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่คลังสินค้า</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            เต๋อหัว แซ่สิ่ว
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                    </li>
                    <li>
                        <div>
                            <h2>ฝ่ายการขาย</h2>
                        </div>
                       <ol>
                            <li>
                                <div>
                                    <h3>หัวหน้าฝ่ายการขาย</h3>
                                    {{ Html::image('../images/org_man3.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                    WEI BO
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการขาย</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            อ้อมขวัญ  เพตรา 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการขาย</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            วรรณภา  สุทธารัตน์ 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการขาย</h4>
                                            {{ Html::image('../images/org_wow2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สุทธิสา แก่นใจ 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการขาย</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            พรเจริญ ชัยหาญ 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่ายการขาย</h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สุรเชษฐ์  ทองไชย 
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <h4>เจ้าหน้าที่ฝ่าย IT </h4>
                                            {{ Html::image('../images/org_man2.png', 'alt', array( 'width' => 30, 'height' => 30 )) }}
                                            สุทธิรักษ์  นาระถี  
                                        </div>
                                    </li>
                                </ol>
                            </li>
                        </ol>
                        
                    </li>
                </ol>
            </li>
        </ol>

    </div>
</div>

               
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
@endsection