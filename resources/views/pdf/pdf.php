<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<style type="text/css">
@font-face {
    font-family: myFirstFont;
    src: url('D:/xampp/htdocs/laravel-basic/publicfonts/THSarabunNew.ttf');
}
table {
    border-collapse: collapse;
    width: 100%;
    font-family:myFirstFont;
}

th, td {
    text-align: left;
    padding: 8px;
    font-family:myFirstFont;
}

tr:nth-child(even){background-color: #f2f2f2}

th {
    background-color: #4CAF50;
    color: white;
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
  @foreach($user as $users)
  <tr>
      <td>{{ $users->id }}</td>
      <td>{{ $users->name }}</td>
      <td>{{ $users->email }}</td>
      <td>{{ $users->phone }}</td>
  </tr>
  @endforeach 
</table>

</body>
</html>



