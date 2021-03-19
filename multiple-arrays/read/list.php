<?php

  require 'read.php';
  include '../libs/users-list.php';
  
?>

<html>

  <head>
    <title>List data</title>
  </head>

  <body>
  	
  	<h2>List data</h2> <hr/><br/>
  	
  	<p>
      The data you sent was:<br/>
      *Click on the user if you want to see his data exclusively
    </p> <br/>
  	
    <?php
      printfUsersList( "long", "list", "all" );  	    
  	?>
  	
  	<br/>
  	
  	<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
  	<a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
