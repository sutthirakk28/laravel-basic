<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style>
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
    }
    @font-face {
        font-family: 'THSarabunNew';
        font-style: normal;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNewBold.ttf') }}") format('truetype');
    }
    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: normal;
        src: url("{{ public_path('fonts/THSarabunNewItalic.ttf') }}") format('truetype');
    }
    @font-face {
        font-family: 'THSarabunNew';
        font-style: italic;
        font-weight: bold;
        src: url("{{ public_path('fonts/THSarabunNewBoldItalic.ttf') }}") format('truetype');
    }
    h2{
        font-family: "THSarabunNew", Arial, Helvetica, sans-serif;
        text-align: center;
        font-size:25px;
    }
    #customers {
        font-family: "THSarabunNew", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size:20px;
        
    }
    #customers td, #customers th {
        border: 1px solid #ddd;
        padding: 8px;
    }

    #customers tr:nth-child(even){background-color: #f2f2f2;}

    #customers tr:hover {background-color: #ddd;}

    #customers th {
        padding-top: 12px;
        padding-bottom: 12px;
        text-align: center;
        background-color: #4CAF50;
        color:white;
        font-size:23px;
    }
</style>
</head>
<body>
<h2>ข้อมูลพนักงาน</h2>
<table id="customers">
  <tr>
    <th>รหัส</th>
    <th>ชื่อ-นามสกุล</th>
    <th>ชื่อเล่น</th>
    <th>อายุ</th>
    <th>เริ่มงาน</th>
    <th >ตำแหน่ง</th>
    <th>เบอร์โทร</th>
  </tr>
  @foreach($lib as $libs)
    <tr>
        <td>{{ $libs['id_employ'] }}</td>
        <td>{{ $libs['surname'] }}</td>
        <td>{{ $libs['nickname'] }}</td>
        <td>{{ $libs['age'] }}</td>
        <td>{{ $libs['job_start'] }}</td>
        <td>{{ $libs['name_pos'] }}</td>
        <td>{{ $libs['phone'] }}</td>
    </tr>
@endforeach
</table>
</body>
</html>


