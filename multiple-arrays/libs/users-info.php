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
  
?>
