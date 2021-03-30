<?php

  require_once 'read.php';
  include_once '../libs/users-list.php';
  include_once '../libs/button.php';

?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>
  	
    <h2>Show data</h2> <hr/><br/>
  	
    <?php
      $id="error";
      
      if ( isset( $_REQUEST['id'] ) ) {
        $id = $_REQUEST['id'];
        printfUsersList( "long", "show", $id );
  	  } else {
  	    
  	  } 	  
  	?>
  	
  	<br/>
  	
  	<?php
  	  createButtons( 'create', 'list', $id, $id, 'menu' );
  	?>
  	
  </body>

</html>




























