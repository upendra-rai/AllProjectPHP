<!DOCTYPE html>
<html>
<head>
	<title>Learn JQuery</title>
<style type="text/css">
	body{font-family: arial}
	#box{
		background-color: yellow;
		padding: 15px;
		border: 15px solid black;
	}

</style>
</head>
<body>
	<h1>Keyboard Events </h1>
	<div id="box">
		<h2>Test Box</h2>
		<p>The History of India begins with the birth of the Indus Valley Civilization, more precisely known as Harappan Civilization. It flourished around 2,500 BC, in the western part of South Asia, what today is Pakistan and Western India.</p>
	</div>
	<script src="jsfile/jquery.js"></script>
	<script>
		$(document).ready(function(){
			$('body').keypress(function(){

				var key = event.which;
				if(key === 13){
					$('body').css('background-color','red');
				}
				
			});
	    
	    	$('body').keyup(function(){
	    		$('body').css('background-color','green')

	    	});
	    	$('body').keydown(function(){
	    		$('body').css('background-color','blue')
	    	});
	    });
		
	</script>

</body>
</html>