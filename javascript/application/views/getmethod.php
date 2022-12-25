<!DOCTYPE html>
<html>
<head>
	<button type="button" id="my_bt" class="btn">button</button>

      <img src="<?php echo base_url(); ?>/image/1.jpeg" alt="" id="my_img">

	<title>Learn Jquery</title>
	<style>
		body{font-family: arial}
		#box{
			background: pink;
			padding: 10px;
			border: 1px solid black;
		}
	</style>
</head>
<body>
 <h1>Get Method</h1>
 <div id="box" class="test abc">
 	<h2> Test Box</h2>
 	<p>The Indus valley civilization was basically an urban civilization and the people lived in well-planned and well-built towns, which were also the centers for trade</p>
 </div>
 <script src="jsfile/jquery.js"></script>
 <script>
 	$(document).ready(function(){
 		$('#my_bt').click(function(){
 			
            $('#my_img').attr('src','<?php echo base_url(); ?>image/2.jpeg');
 		});
 		var a=$('body').html();
 		console.log(a);
 		var b=$('#box').html();
 		console.log(b);
 		var c=$('#box').text();
 		console.log(c);
 		var d=$('#box').attr('class');
 		  console.log(d);


 	});
 </script>
</body>
</html>