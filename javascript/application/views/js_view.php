<!DOCTYPE html>
<html>
<head>
	<title>java script Test</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
	<style>
div {
  background-color: blue;
  width: 300px;
  border: 15px solid red ;
  padding: 50px;
  margin: 20px;
}
</style>
	
	<div id="test1">
	<h1>Test Box 1</h1>
    <p>
    	Reasonable people may disagree as to weather the best criterion measure of intelligence in school grades, teacher ratings or some other measures
    </p>
    </div>
    <div id="test2">
    	<h1> Test Box 2</h1>
    	<p>Text refers to the actual words written in a book, newspaper, blog post, or any other written work. Pictures, charts, and other images are not text. When you read ...</p>
    	
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
    	
    	$(document).ready(function(){
     var a =$('#test1').html();
       console.log(a);
       var b=$('#test2').html();
       console.log(b);

    	});
    </script>
</body>
</html>