<?php
  
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
        0 => $request['id'],
        1 => $request['name'],
        2 => $request['gender'],
        3 => intval( $request['age'] ),
        4 => filter_var( $request['email'], FILTER_SANITIZE_EMAIL ) //NO
      );

      return $user;
    } else {
      return false;  //The info was not sent
    }
  }

?>
