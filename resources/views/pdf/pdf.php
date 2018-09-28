<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>        
        @font-face {
            font-family: 'THSarabunNew';
            font-weight: normal;
            src: url("{{ asset('fonts/THSarabunNew.ttf') }}") format("truetype");
        }

        body {
            font-family: 'THSarabunNew';
        }
    </style>
</head>
<body>
    <h2>ข้อมูลผู้ดูแล</h2>
    <table>
    <tr>
        <th>Firstname</th>
        <th>Lastname</th>
        <th>Savings</th>
        <th>ดดดดดดดดดด</th>
    </tr>
@foreach($users as $u)
    <tr>
        <td>$u->id</td>
        <td>$u->name</td>
        <td>$u->email</td>
        <td>$u->phone</td>
    </tr>				    
@endforeach

    </table>
</body>
</html>