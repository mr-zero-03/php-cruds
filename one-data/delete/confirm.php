<?php 
  require '../read/read.php';
  $data = file_get_contents($filename);
?>

<html>

  <head>
    <title>Delete</title>
  </head>

  <body>
  	
  	<h2>Delete</h2> <hr/><br/>
  	
  	<?php
  	  echo "Are you sure you want to delete '" . $data . "'?<br/><br/>";
  	?>
  	
    <a href="delete.php"> <input type="button" value="Yes"/> </a>
    <a href="../"> <input type="button" value="No"/> </a>
  	
  </body>

</html>
