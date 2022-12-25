<!DOCTYPE html>
<html>
<head>
	<title>Learn Jquery</title>
	<style>
		body{ font-family: arial }
		#box{
			background-color: red;
			padding: 15px;
			border: 20px solid yellow;
		}
	</style>
</head>
<body>
	<h1> Mouse Events</h1>
	<div id="box" class="test">
		<h2>Test Box</h2>
		<p>During the life time of Lord Gautam Buddha, sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC. Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>
	<script src="jsfile/jquery.js"></script>
	<script>
		$(document).ready(function(){
			//div  click then active  mouse events
		$('#box').click(function(){
	    $('#box').css('background-color','black');
	    var a=$('#box').html();
	    console.log(a);

	});
		//div double click then active  mouse events
		$('#box').dblclick(function(){
			$('#box').css('background-color','yellow');
		});
		//div left key press click then active  mouse events
		$('#box').contextmenu(function(){
			$('#box').css('background-color','green');
		});
		//div enter mouse couser  then active  mouse events
		$('#box').mouseenter(function(){
			$('#box').css('background-color','pink')
		});
		//div  leave the mouse couser then active  mouse events
		$('#box').mouseleave(function(){
          $('#box').css('background-color','tan')
		});
	});
		
	</script>

</body>
</html>