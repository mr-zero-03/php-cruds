<?php
  $filename = "../data.json";
  
  if( file_exists( $filename ) == false ){
    
    $errorText = "<title>Data empty</title>";
  	$errorText .= "<h2>Data empty!</h2> <hr/><br/>";
    $errorText .= "Error, you have not sent data yet";
    $errorText .= '<br/><br/> <a href="../create/create.php"> <input type="button" value="Create"/> </a>';
    $errorText .= '<a href="../"> <input type="button" value="Go back to the menu"/> </a>';

    echo $errorText;
		
    die();
  }
?>
