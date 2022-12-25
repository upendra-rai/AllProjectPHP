<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		h1{font-size: 25px;}
		#box{
			background: lightgreen;
			padding: 10px;
			border: 1px solid #000;
		}
	</style>
</head>
<body>
	<h1>Append & prepend Method</h1>
	<div id="box">
		<h2>Test Box</h2>
		<p>
		During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>

		<button id="appendBtn">Append</button>
		<button id="prependBtn">Prepend</button>
		<script src="jsfile/jquery.js"></script>
		<script>
			$(document).ready(function(){
				$("#appendBtn").click(function(){
					$("#box").append("<h2>hello</h2>");
				});
				$("#prependBtn").click(function(){
					$("#box").prepend("<h2>hello prepend</h2>");
				});
			});

		</script>

</body>
</html>