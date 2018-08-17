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
		<option value="{{ $id->id }}">{{ $id->id }}/{{ $id->surname }}</option>
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
	        <tfoot>
	        </tfoot>
	    </table>  
	    <meta name="csrf-token" content="{{ csrf_token() }}">
	</div>
	<script type="text/javascript">
    $(document).ready(function(){
        $('#studentid').on('change',function(){
        	var studentid = $(this).val();
        	console.log(studentid);
        	loadScore(studentid);
        })
    });

    //function ajax
    function loadScore(studentid)
    {   
    	var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.ajax({
            type :'POST',
            url : "{{ url('/getDataScore') }}",
            data : {_token: CSRF_TOKEN,studentid:studentid},
            dataType : 'json',
            success : function(student)
            {	 console.log(student);
                $('tbody').empty();
                $.each(student,function(index){
                	
                	var row = $('<tr/>');
	                row.append($('<td/>',{
	                	text : student[index].id_per,
	                })).append($('<td/>',{
	                	text : student[index].type_leave,
	                })).append($('<td/>',{
	                	text : student[index].nstart_day,
	                })).append($('<td/>',{
	                	text : student[index].nend_day,
	                }))
	                
	                $('tbody').append(row);
	            })
                $('tfoot').empty();
	            $('tfoot').append($("<tr/>",{

	                })).append($('<td/>',{
	                	text : student.id_per,
	                	colspan : 4,
	                	style : ['background-color:#ccc;font-weight:bold;text-align:right;']
	            	}))               
            }
        })
    }
</script>
</body>
</html>