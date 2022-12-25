<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		#box{
			background: tan;
			padding: 10px;
			border: 3px solid black;
		}
		.red{color:red;}
	</style>
</head>
<body>
	<h1>JQuery Set Methods </h1>
	<div id="box" class="test">
		<h2>Test Box</h2>
		<p>The Indus valley civilization was basically an urban civilization and the people lived in well-planned and well-built towns, which were also the centers for trade</p>
	</div>
	<br>
	<button id="clickbutton">Set Value</button>
	<script src="jsfile/jquery.js"></script>
		<script>
			$(document).ready(function(){
				$('#clickbutton').click(function(){
					$('#box h2').text("Hello");
                  
				});
				$('#box p').text("This is the new paragraph ");
				$('#box p').html("this <b>is the new new </b>text.")
				$('#box h2').attr("class","red");
				//$('#box p').attr("class","yellow")

				
			});
		</script>

</body>
</html>