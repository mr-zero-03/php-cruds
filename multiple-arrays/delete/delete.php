<?php
	require '../read/read.php';
	
	$usersDelete = $_GET;
	
	$jsonData = file_get_contents($filename);
  $usersList = json_decode( $jsonData );
?>

<html>

  <head>
    <title>Deleted</title>
  </head>

  <body>
  	
  	<h2>Deleted</h2> <hr/><br/>
		
    <p>
      <?php
      
        foreach ( $usersDelete as $idDelete ) {
          unset ( $usersList[$idDelete] );
        }
        $usersList = array_values($usersList);
        
        $deletedText = "The users with the ID(s): '";
        foreach ( $_GET as $idDelete ) {
          $deletedText .= $idDelete . " . ";
        }
        $deletedText .= "' were deleted";
        
        if ( $usersList == null ) {
          unlink( $filename );
          
          $deletedText .= "<br/><br/><b>All the users have been deleted</b>";
          
        } else {
          
          for ( $i=0; $i < count($usersList); $i++ ){
            $usersList[$i][0] = $i;
          }
          
          $jsonData = json_encode( $usersList );
			    file_put_contents( $filename, $jsonData );
        }
        
        echo $deletedText;
        
      ?>
  	</p>
 
  	<br/>
  	<a href="../create/create.php"> <input type="button" value="Create"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
