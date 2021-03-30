<?php

	require_once '../read/read.php';
	include_once '../libs/users-info.php' ;
	include_once '../libs/save-user-info.php';
	include_once '../libs/button.php';

  $usersDelete = $_REQUEST;

  if ( empty($usersDelete) ) {
    include_once '../templates/no-request.php';
    noRequestSent();

    die;
  }

?>

<html>

  <head>
    <title>Deleted</title>
  </head>

  <body>
  	
  	<h2>Deleted</h2> <hr/><br/>
		
    <?php
      $usersToDeleteText = ""; $usersDontExistsText = "";
      
      foreach ( $usersDelete as $idDelete => $valueOn ) {
        if ( $idDelete === "selectAll" ) { continue; }

        if ( isset( $usersList[$idDelete][0] ) ){
          $usersToDeleteText .= "<li>" . $idDelete . "</li>";
          unset ( $usersList[$idDelete] );
        } else {
          $usersDontExistsText .= "<li>" . $idDelete . "</li>";
        }
      }
      $usersList = array_values( $usersList );
    
    
      if ( $usersToDeleteText != "" ) { ?>
        <p>Were deleted the user(s) with the ID(s): <br/> <?php echo "<ul>" . $usersToDeleteText . "</ul>"; ?> </p>
      <?php } else { ?>
        <p>You have not sent valid IDs<p>
      <?php } ?>
    
      <br/>
    
      <?php if ( $usersDontExistsText != "" ) { ?>
        <p>ID(s) that you have sent but does not exists: <br/> <?php echo "<ul>" . $usersDontExistsText . "</ul>"; ?> </p>
      <?php } ?>
      
      <?php if ( $usersList == null ) {
      
        unlink( $filename ); ?>      
        <p><b>All the users have been deleted</b></p>
        <?php createButtons( 'create', false, false, false, 'menu' );
      
      } else {          
        for ( $i=0; $i < count($usersList); $i++ ){  //Reassigning the IDs
          $usersList[$i][0] = $i;
        }
        saveUserInfo( $usersList, "delete" );
        
        createButtons( 'create', 'list', 'update', 'delete', 'menu' );
        
      }
    ?>
    
  </body>

</html>
