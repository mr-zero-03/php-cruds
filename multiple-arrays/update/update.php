<?php 

  require_once '../read/read.php';
  include_once '../libs/users-list.php';
  include_once '../libs/save-user-info.php';
  include_once '../libs/button.php';
 
  $id = $_REQUEST['id'];
  
  $user = getUserByRequest();
  
?>


<html>

  <head>
    <title>Data updated</title>
  </head>

  <body>
  	
    <h2>Data updated</h2> <hr/><br/>
  	
  	<p><b>ID: </b><?php echo $id; ?></p>
	  
	  <?php
	    printfUsersList( "long", "update", $id );
	    
	    saveUserInfo( $user, "update" );
    ?>
  	
  	<br/><br/>
    
    <?php
      createButtons( false, 'list', $id, $id, 'menu' );
    ?>
  	
  </body>

</html>
