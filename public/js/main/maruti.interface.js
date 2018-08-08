
$(document).ready(function(){
	
	// === jQuery Peity === //
	$.fn.peity.defaults.line = {
		strokeWidth: 1,
		delimeter: ",",
		height: 24,
		max: null,
		min: 0,
		width: 50
	};
	$.fn.peity.defaults.bar = {
		delimeter: ",",
		height: 24,
		max: null,
		min: 0,
		width: 50
	};
	$(".peity_line_good span").peity("line", {
		colour: "#B1FFA9",
		strokeColour: "#459D1C"
	});
	$(".peity_line_bad span").peity("line", {
		colour: "#FFC4C7",
		strokeColour: "#BA1E20"
	});	
	$(".peity_line_neutral span").peity("line", {
		colour: "#CCCCCC",
		strokeColour: "#757575"
	});
	$(".peity_bar_good span").peity("bar", {
		colour: "#459D1C"
	});
	$(".peity_bar_bad span").peity("bar", {
		colour: "#BA1E20"
	});	
	$(".peity_bar_neutral span").peity("bar", {
		colour: "#757575"
	});
	
	// === jQeury Gritter, a growl-like notifications === //
	// $.gritter.add({
	// 	title:	'แจ้งเตือน',
	// 	text:	'แก้ไขข้อมูลฝ่ายเรียบร้อยแล้ว',
	// 	image: 	'../../laravel-basic/public/images/img/demo/envelope2.png',
	// 	sticky: false
	// });	
	$('#gritter-notify .normal').show(function(){
		$.gritter.add({
			title:	'แจ้งเตือน',
			text:	'แก้ไขข้อมูลเรียบร้อยแล้ว',
			image: 	'../../laravel-basic/public/images/img/demo/envelope2.png',
			sticky: false
		});		
	});
	
	$('#gritter-notify .sticky').show(function(){
		$.gritter.add({
			title:	'แจ้งเตือน',
			text:	'ลบข้อมูลเรียบร้อยแล้ว',
			image: 	'../../laravel-basic/public/images/img/demo/envelope2.png',
			sticky: true
		});		
	});
	
	$('#gritter-notify .image').click(function(){
		var imgsrc = $(this).attr('data-image');
		$.gritter.add({
			title:	'Important Unread messages',
			text:	'Youแแแหหห have 12 unread messages.',
			image: imgsrc,
			sticky: false
		});		
	});
});
