<?php
  

  $cookie_name="cookie";
  $cookie_value="cookies valuesssssssssssssss";

  setcookie($cookie_name,$cookie_value, time()+(86400),"/");
  ?>

 
  <!DOCTYPE html>
  <html>
      <body>
      	<?php 
   if(!isset($_COOKIE[$cookie_name])){
      echo "Cookie is not set";
     }else{
     	echo $_COOKIE[$cookie_name];
     }

      	?>


      </body>
  </html>