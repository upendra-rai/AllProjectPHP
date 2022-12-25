<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		#box{
			padding: 10px;
			border: 2px solid red;
		}
	</style>
</head>
<body>
	<h1>Css Method</h1>
	<div id="box">
		<h2> Test Box</h2>
		<p>
During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>
	<br>
	<button id="stylebutton">Add Style</button>
	<script src="jsfile/jquery.js"></script>
	<script>
		$(document).ready(function(){
			$('#stylebutton').click(function(){
				$('#box').css("background","pink");
				$('#box').css({"background":"red","color":"yellow","border":"5px Dotted yellow"})
			});
		});
	</script>

</body>
</html>