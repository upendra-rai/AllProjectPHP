<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
	<style>
		body{font-family: arial}
		#box{
			padding: 10px;
			border: 2px solid black;
		}
		.boxbg{background: red;}
	</style>
</head>
<body>
 <h1>ON Method</h1>
 <div id="box">
 	<h2>Test Box</h2>
 	<p>
During the life time of Lord Gautam Buddha, <span>sixteen great powers (Mahajanpadas) existed in the 7th and early 6th centuries BC.</span> Among the more important republics were the Sakyas of Kapilavastu and the Licchavis of Vaishali.</p>
 </div>
 <br>
 <button>Remove</button>
 <script src="jsfile/jquery.js"></script>
   <script>
   		$(document).ready(function(){
   			/*$("#box").on("click",function(){
   				$(this).css("background","orange");
   			});
   			$("#box").on("mouseover mouseout",function(){
   				$(this).toggleClass("boxbg");
   			});*/

   			$("#box").on({
   				"click" : function(){
   				$(this).css("background","red");

 				},
 				"mouseover" : function(){
   				$(this).css("background","blue");
   				
 				},
 				"mouseout" : function(){
   				$(this).css("background","green");
 				}
   			});
   			$("button").click(function(){
   				$("#box").off("mouseout mouseover");

   			});
   		});
   </script>
</body>
</html>