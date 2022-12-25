<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		#box{
			background: red;
			padding: 10px;
			border: 1px solid #000;
		}
	</style>
</head>
<body>
	<h1>After & Before Methods</h1>
	<div id="box">
		<h2>Test Box</h2>
		<p>
		During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>
   <button id="afterBtn">After</button>
    <button id="beforerBtn">Before</button>
    <script src="jsfile/jquery.js"></script>
    <script>
    	$(document).ready(function(){
    		$('#afterBtn').click(function(){
    			$('#box').after("<h3>AfterButton</h3>")
    		});
    		$('#beforerBtn').click(function(){
    			$('#box').before("<h2>Before Button</h2>")
    		});
    	});
    </script>
</body>
</html>