<?php  //THIS FILE IS THE MODEL (MVC)
  
  $filename = '../data.json';
  
  $usersList = array();
  $sizeUsersList = 0;
  $existsUsers = false;
  
  if ( file_exists( $filename ) ){
    $jsonData = file_get_contents( $filename );
    $usersList = json_decode ( $jsonData, true );
    $sizeUsersList = count( $usersList );
    
    if ( $sizeUsersList > 0 ) {
      $existsUsers = true;
    }
  }


  function getUserByRequest ( $request ) {
    if ( is_array( $request ) && !empty( $request ) ) {
      $user = array(
        0 => intval( $request['id'] ),
        1 => filter_var( $request['name'], FILTER_SANITIZE_STRING ),
        2 => filter_var( $request['gender'], FILTER_SANITIZE_STRING ),
        3 => intval( $request['age'] ),
        4 => filter_var( $request['email'], FILTER_SANITIZE_EMAIL )
      );
      
      $user[1] = preg_replace('/[0-9]+/', '', $user[1]);
      $user[2] = preg_replace('/[0-9]+/', '', $user[2]);
      
      if ( is_numeric ( $user[0] ) && $user[0]>=0 && $user[1]!="" && $user[2]!="" && is_numeric ( $user[3] ) && $user[3]>=0 && strpos ( $user[4], '@' ) ) { 
        return $user; 
      } else { return false; }
      
    } else {
      return false;  //The info was not sent
    }
  }


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
