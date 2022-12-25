<!DOCTYPE html>
<html>
<head>
	<title>Learn Jquery</title>
	<style>
		body{font-family: arial}
		#box{
			background: lightgreen;
			padding: 20px;
			border: 3px solid red;
		}
	</style>
</head>
<body>
	<h1>Empty And Remove Methods</h1>
	<div id="box">
		<h2>Test Box</h2>
		<p>
		During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>
	<button id="emptyBtn">Empty </button>
	<button id="removeBtn">Remove</button>
	<script src="jsfile/jquery.js"></script>
	<script>
      $(document).ready(function(){
      	$('#emptyBtn').click(function(){
           $('#box').empty();
      	});
      	$('#removeBtn').click(function(){
      		$('#box').remove();
      	});
      });
	</script>
</body>
</html>