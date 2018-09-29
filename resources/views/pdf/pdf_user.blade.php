<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link href="https://fonts.googleapis.com/css?family=Maitree:100,600" rel="stylesheet" type="text/css">

<style>
    @font-face {
            font-family: 'THSarabunNew';
            font-style: normal;
            font-weight: normal;
            src: url("{{ public_path('fonts/THSarabunNew.ttf') }}") format('truetype');
        }
 
        body {
            font-family: "THSarabunNew";
        }
    h2{
        text-align: center;
        font-family: "Maitree";
    }
    #customers {
        font-family: "THSarabunNew", Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
        font-size:15px;
        
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
        text-align: left;
        background-color: #4CAF50;
        color:white;
    }
    th{
        font-size:17px;
        text-align: center;
    }
</style>
</head>
<body>
<h2>ข้อมูลผู้ดูแล</h2>
<table id="customers">
  <tr>
    <th>id</th>
    <th>ชื่อ</th>
    <th>อีเมล</th>
    <th>เบอร์โทรศัพท์</th>
  </tr>
  @foreach($user as $u)
    <tr>
        <td>{{ $u['id'] }}</td>
        <td>{{ $u['name'] }}</td>
        <td>{{ $u['email'] }}</td>
        <td>{{ $u['phone'] }}</td>
    </tr>
@endforeach
</table>
 
{{base_path()}} <br>
  
{{app_path() }}      <br> 

  
{{public_path()}}<br>

  
{{storage_path('app\fonts\5e0a305670314e05eaffd2451621eb1e.ttf')}}<br>

   
{{storage_path('app')}}
</body>
</html>


