<?php 
  require 'read.php';
  $data = file_get_contents($filename);
?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>
  	
  	<h2>Show data</h2> <hr/><br/>
  	
  	<p>
  	  <?php
  	    echo "The data you sent was: " . $data; 
  	  ?>
  	</p>
  	
  	<br/>
  	
  	<a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
