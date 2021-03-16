<?php
	require '../read/read.php';
?>

<html>

  <head>
    <title>Deleted</title>
  </head>

  <body>
  	
  	<h2>Deleted</h2> <hr/><br/>
		
    <p>
      <?php
      
        if( file_exists( $filename ) ){
          unlink( $filename );
          echo "Data deleted correctly";
        } else {
          echo "The data was deleted before";
        }
      ?>
  	</p>
 
  	<br/>
  	<a href="../create/create.html"> <input type="button" value="Create"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
