$(document).ready(function() {
	$('#sname,#sclass,#scoutry').focus(function(){
		$(this).css('background-color','red')
	});
	$('#sname,#sclass,#scoutry').blur(function(){
      $(this).css('background-color','');
	});
	$('#scoutry').change(function(){
		 $(this).css('background-color','yellow');
		var a = $(this).val();
		$('#test').html(a);
		
	});
	$('#sname,#sclass').select(function(){
		$(this).css('background-color','yellow')
	});
   $('#sform').submit(function(){
   	console.log("form Submitted");
   	  alert("form submitted")
   });

});