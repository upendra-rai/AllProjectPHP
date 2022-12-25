$(document).ready(function(){
	$(window).scroll(function(){
		console.log("you are scrolling");
	});
	$('#box').scroll(function(){
		console.log("you are scrolling");
	});
	$(window).resize(function(){
		console.log("Window resize");
	});
	
});