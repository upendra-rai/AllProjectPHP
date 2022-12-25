<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		#box{
			background: lightgreen;
			padding: 20px;
			border: 5px solid #000;
		}
		#box2{
			background: lightgreen;
			padding: 20px;
			border: 5px solid #000;
		}
	</style>
</head>
<body>
	<h1>Clone Method</h1>
	<div id="box">
		<h2>Test Box</h2>
		<p>
		During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>
<br>
 <div id="box2">
 	<p>This is another div </p>
 </div>
  <button id="cloneBtn">Cloning</button>
  <script src="jsfile/jquery.js"></script>
  <script>
  	$(document).ready(function(){
  		$('#cloneBtn').click(function(){

  			 $('#box h2').clone().prependTo('#box2');
  			 $('#box p').clone().prependTo('#box2');
  		});
  	});
  </script>
</body>
</html>