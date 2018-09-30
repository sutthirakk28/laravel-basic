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
<h2>ข้อมูลฝ่าย</h2>
<table id="customers">
  <tr>
    <th>id</th>
    <th>ชื่อฝ่าย</th>
    <th>สร้างเมื่อ</th>
    <th>แก้ไขล่าสุด</th>
  </tr>
  @foreach($dep as $deps)
    <tr>
        <td>{{ $deps['id_dep'] }}</td>
        <td>{{ $deps['name_dep'] }}</td>
        <td>{{ $deps['created_at'] }}</td>
        <td>{{ $deps['updated_at'] }}</td>
    </tr>
@endforeach
</table>
</body>
</html>


