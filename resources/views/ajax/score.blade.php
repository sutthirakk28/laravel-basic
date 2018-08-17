<!DOCTYPE gtml>
<html><html>
<head>
	<title>ajax</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<style type="text/css">
		table,th,td{
			border: 1px solid #e41c1c;
			border-collapse: collapse;
			padding: 5px;
		}
		table tr:nth-child(odd){
			background-color: #f9f7f7;
		}
		table tr:nth-child(even){
			background-color: #f9f7f7;
		}
		.container{
			padding: 15px;
			width: 700px;
			box-shadow: 0px 0px 2px gray;
			margin: 0 auto;
		}
	</style>
</head>
<body>
	<div class="container">
		select StudentID : <select name="studentid" id="studentid">
		<option value="">--------</option>
		@foreach($IDs as $id)
		<option value="{{ $id->id }}">{{ $id->id }}</option>
		@endforeach
		</select>
		<table border="1" style="text-align:center;color: #b624da;">
	        <thead>
	            <tr>
	                <th>รหัสพนักงาน</th>
	                <th>ประเภท</th>
	                <th>เริ่ม</th>
	                <th>สิ้นสุด</th>
	            </tr>   
	        </thead>
	        <tbody>

	        </tbody>
	    </table>  
	</div>
	<script type="text/javascript">
    $(document).ready(function(){
        loadScore(44)
    });

    //function ajax
    function loadScore(studentid)
    {   
        $.ajax({
            type :'get',
            url : "{{ url('/getDataScore') }}",
            data : {studentid:studentid},
            dataType : 'json',
            success : function(data)
            {
                $('tbody').empty();
                $.each(data.id_per,function(i,data){

                	var row = $('<tr/>');
	                row.append($('<td/>',{
	                	text : data.id_per,
	                })).append($('<td/>',{
	                	text : data.type_leave
	                })).append($('<td/>',{
	                	text : data.nstart_day
	                })).append($('<td/>',{
	                	text : data.nend_day
	                }))
	                
	                $('tbody').append(row); 
	                console.log(row); 
                })
                    
            }
        })
    }
</script>
</body>
</html>