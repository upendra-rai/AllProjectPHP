<!DOCTYPE html>
<html>
<head>
	<title>Learn Jquery</title>
	<style>
		body{font-family: arial}
		#box{
			background: yellow;
			padding: 10px;
			border: 3px dotted black;
		}
		.first{background: tan;}
		.second{background: pink;}
	</style>
</head>
<body>
	<h1> JQuery Class Methods</h1>
	<div id="box">
		<h2>Test Blox</h2>
		</div>
		<br>
		<button id="addbutton">Add Class</button>
		<button id="removebutton">Remove Class</button>
		<button id="togglebutton">Toggle Class</button>

		<script src="jsfile/jquery.js"></script>
		<script>
			$('#addbutton').click(fucntion(){
				$('#box').addClass("first");
			});
			$('#removebutton').click(fucntion(){
 				
 				$('#box').removeClass("second");
			});
			$('#togglebutton').click(fucntion(){
 				
 				$('#box').toggleClass("second");
			});

		</script>
		
</body>
</html>