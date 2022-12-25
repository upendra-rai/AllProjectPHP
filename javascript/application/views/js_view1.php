<!DOCTYPE html>
<html>
<head>
	<title>Practice JQuery</title>
	<style>
		<body>{ font-family: arial }
		#box{
			padding: 10px;
			border: 3px solid blue;
		}
		
	</style>
</head>
<body>
<h1> JQuery Selector</h1>
<div id="box" class="test">
<h2>Test Box</h2>	
<p>This is a box and write some about of box and ....................</p>
</div>
<ul id = "list">
	<li>Orange</li>
	<li class="test">Banana</li>
	<li>Grapes</li>
	<li class="test">Apple</li>
	<li>Guava</li>
</ul>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$("#list").css("color","blue");
				$("#list").css("border","2px solid blue");
                 $("#list li").css("border","2px solid blue")
         	     $(".test").css("border","2px strong-solid blue");

			});

		</script>
</body>
</html>