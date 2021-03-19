<?php

  $filename = "../data.json";
  
?>

<html>
  <?php if( file_exists( $filename ) == false ){?>
    <head>
      <title>Data empty</title>
    </head>
    
    <body>
    
      <h2>Data empty!</h2> <hr/><br/>
      
      <p>Error, you have not sent data yet</p>

      <br/><br/> <a href="../create/create.php"> <input type="button" value="Create"/> </a>
      <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    </body>

  <?php
    die();
  }
  ?>

</html>
