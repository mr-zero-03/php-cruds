<?php

  require 'read.php';
  include '../libs/users-list.php';

?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>
  	
    <h2>Show data</h2> <hr/><br/>
  	
    <?php 
      $id;
      
      if ( isset( $_GET['id'] ) ) {
        $id = $_GET['id'];
        printfUsersList( "long", "show", $id );
  	  } else { ?>
  	    <h3>ERROR</h3> <br/>
  	    <p>You have to choose the user you want to see</p> <br/><br/>
  	<?php } ?>
  	
  	<br/>
  	
  	<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
  	<a href="list.php"> <input type="button" value="Go to list again"/> </a>
  	<?php if (isset( $_GET['id'] )) { echo "<a href='../update/edit.php?id=$id'> <input type='button' value='Update data'/> </a>"; } ?>
    <?php if (isset( $_GET['id'] )) { echo "<a href='../delete/confirm.php?id=$id'> <input type='button' value='Delete data'/> </a>"; } ?>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>




























