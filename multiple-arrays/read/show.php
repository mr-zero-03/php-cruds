<?php

  require_once 'read.php';
  include_once '../libs/users-list.php';

?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>
  	
    <h2>Show data</h2> <hr/><br/>
  	
    <?php
    
      $idRecived;
      
      if ( isset( $_GET['id'] ) ) {
        $idRecived = $_GET['id'];
        printfUsersList( "long", "show", $idRecived );
  	  }
  	?>
  	
  	<br/>
  	
  	<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
  	<a href="list.php"> <input type="button" value="Go to list again"/> </a>
  	<?php if (isset( $_GET['id'] )) { echo "<a href='../update/edit.php?id=$idRecived'> <input type='button' value='Update data'/> </a>"; } ?>
    <?php if (isset( $_GET['id'] )) { echo "<a href='../delete/confirm.php?id=$idRecived'> <input type='button' value='Delete data'/> </a>"; } ?>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>




























