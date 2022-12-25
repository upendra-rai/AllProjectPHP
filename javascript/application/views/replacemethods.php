<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		#box{
			background: lightgreen;
			padding:10px;
			border: 5px solid #000;
		}
	</style>
</head>
<body>
	<h1>Replace With And ReplaceAll </h1>
	<div id="box">
		<h2> Test Box</h2>
		<p>
		During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>

		<p>The Ramayana and Mahabharata were the two great epics of this period.</p>
		<p>Harshavardhana is well known for his religious toleration, able administration and diplomatic relations. He maintained diplomatic relations with China and sent envoys</p>

	</div>
	<br>
	<button id="replaceBtn">Replace</button>
	<script src="jsfile/jquery.js"></script>
	<script>
		$(document).ready(function(){
			$('#replaceBtn').click(function(){
				$('#box p:first').replaceWith("<h3> replace</h3> ");
			});
		});
	</script>

</body>
</html>