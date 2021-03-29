<?php
  
  include_once 'users-info.php';
  
  function saveUserInfo( $user, $type ) {
    global $filename;
    global $usersList;
    global $sizeUsersList;
    
    switch ( $type ) {
      case "new":
        if ( $user[0] == null ){
          $user[0] = 0;
	        $usersList[0] = $user;
	      } else {
		      array_push( $usersList, $user );
	      }
	    break;
	  
	    case "update":
	      $id = $user[0];
        $usersList[$id] = $user;
      break;
    }
    
	  $jsonData = json_encode( $usersList );
    file_put_contents( $filename, $jsonData );
  }
  
?>