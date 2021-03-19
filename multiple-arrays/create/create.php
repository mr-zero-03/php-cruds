<?php

  include '../libs/form-user.php';
  
?>

<!DOCTYPE html>

<html>

  <head>
    <title>Creating data</title>
  </head>

  <body>
  	
  	<h2>Creating data</h2> <hr/><br/><br/>
  	
  	<?php
      form("new.php", "post", "create");
  	?>
  	
  </body>

</html>
