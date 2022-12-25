<?php
  

  $cookie_name="user";
  $cookie_value="cookies page";

  setcookie($cookie_name,$cookie_value, time(),"/");
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