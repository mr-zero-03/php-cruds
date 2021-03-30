<?php
  
  include_once '../libs/users-info.php';
  include_once '../libs/save-user-info.php';
  include_once '../libs/button.php';
  
  $user = array(
    0 => $sizeUsersList,
    1 => $_REQUEST['name'],
    2 => $_REQUEST['gender'],
    3 => $_REQUEST['age'],
    4 => $_REQUEST['email']
  );
  
  $id = $user[0];
	
	saveUserInfo( $user, "new" ); 
  
  
  include_once '../libs/users-list.php';

?>

<!DOCTYPE html>

<html>

  <head>
    <title>Data sent</title>
  </head>

  <body>
   
    <h2>Data sent</h2> <hr/><br/>
		
    <p>The data you sent was:</p> <br/>
	  
    <?php
      printfUsersList( "long", "new", $sizeUsersList );
    ?>
    
    <p>The data was sent correctly</p>

    
    <br/><br/>
    
    <?php
      createButtons( 'create', 'list', $id, $id, 'menu' );
    ?>
    
  </body>

</html>
