<?php
  
  $filename = '../data.json';
  
  $usersList;
  $sizeUsersList=0;
  
  if ( file_exists( $filename ) ){
    $jsonData = file_get_contents( $filename );
    $usersList = json_decode ( $jsonData, true );
    $sizeUsersList = count( $usersList );
  }
  
  function existsData(){
    global $filename;
      
    if ( file_exists( $filename ) ){      
      return true; //Info charged correctly
    } else {
      return false;  //Info was not charged
    } 
  }
  
  function getUserByRequest(){
    $user = array(
      0 => $_REQUEST['id'],
      1 => $_REQUEST['name'],
      2 => $_REQUEST['gender'],
      3 => $_REQUEST['age'],
      4 => $_REQUEST['email']
    );
    
    return $user;
  }
  
?>
