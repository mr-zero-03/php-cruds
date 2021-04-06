<?php
  
  include_once 'users-info.php';
  
  function saveUserInfo( $user, $type ) {
    global $filename;
    global $usersList;
    global $sizeUsersList;
    
    if ( ( in_array( null, $user, true ) ) == false ) {
    
      switch ( $type ) {
        case "new":
		        array_push( $usersList, $user );
	      break;
	  
	      case "update":
	        $id = $user[0];
          $usersList[$id] = $user;
        break;
      }
    
	    $jsonData = json_encode( $usersList );
      file_put_contents( $filename, $jsonData );
    }
  }
  
?>
