<!DOCTYPE html>
<html>
<head>
	<title> Learn JQuery</title>
	<style type="text/css">
		body{font-family: arial}
		#box{
			background: white;
			padding: 10px;
			border: 1px solid #000;
		}
	</style>
</head>
<body>
	<h1>JQuery Selectors</h1>
	<div id="box" class="test">
		<h2>Test Box</h2>
		<p>During the life time of Lord Gautam Buddha, sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC. Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
	</div>
	<ul id="list">
		<li>Orange</li>
		<li class="test">Grapes</li>
		<li>Banana</li>
		<li class="test">Apple</li>
		<li>Mango</li>
	</ul>
  <script src="jsfile/jquery.js"></script>
  <script>
  	$(document).ready(function(){
  		$('#list').css("color","blue");
  		//$('#list').css("border","2px solid yellow");
  		//$('#list li').css("border","2px solid red");
  		//$(".test").css("border","2px solid black");
  	    //$("*").css("border","2px solid blue")
  	    //$("li:first").css("border","2px solid pink ");
  	   // $("li:last").css("border","2px solid red ");
  	   // $("ul li:eq(2)").css("border","2px solid red ");
  	   // $("ul li:gt(2)").css("border","2px solid black ");
  	    $("ul li:lt(1)").css("border","3px solid red")
  	});
  </script>
</body>
</html>