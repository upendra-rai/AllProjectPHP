<?php

 session_start();
?>
<!DOCTYPE html>
<html>
 <head>
	<title></title>
 </head>
 <body>
	<?php
	     if(isset($_SESSION["USERNAME"])){
	  echo "USERNAME :".$_SESSION["USERNAME"];
}
	?>
 </body>


</html>