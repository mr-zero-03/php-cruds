<?php  //THIS FILE IS THE MODEL (MVC)
  include_once ( 'struct-name.php' );

  $filename = '../db/' . $structName['forcode'] . '.json';

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
        'id' => intval( $request['id'] ),
        'name' => filter_var( $request['name'], FILTER_SANITIZE_STRING ),
        'gender' => filter_var( $request['gender'], FILTER_SANITIZE_STRING ),
        'age' => intval( $request['age'] ),
        'email' => filter_var( $request['email'], FILTER_SANITIZE_EMAIL )
      );

      $user['name'] = preg_replace('/[0-9]+/', '', $user['name']);  //To avoid the user send numbers on the string 'name'
      if ( ( $user['gender'] !== 'female' ) && ( $user['gender'] !== 'male' ) ) { $user['gender'] = 'Undefined'; }
      if ( $user['age'] < 0 ) { $user['age'] = abs( $user['age'] ); }

      return $user;
    } else { return false; }
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
	        $id = $user[ 'id' ];
          $usersList[ $id ] = $user;
        break;
      }

	    $jsonData = json_encode( $usersList );
      file_put_contents( $filename, $jsonData );
    }
  }
