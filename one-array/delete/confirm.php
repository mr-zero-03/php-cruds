<?php 
  require '../read/read.php';
  
  $jsonData = file_get_contents($filename);
  $user = json_decode( $jsonData );
?>

<html>

  <head>
    <title>Delete</title>
  </head>

  <body>
  	
  	<h2>Delete</h2> <hr/><br/>
  	
  	<?php
  	  $deleteDataText = "Are you sure you want to delete?: <br/><br/>";
  	  
  	  $deleteDataText = "The last data was: <br/>";
      $deleteDataText .= "<ul>";
      $deleteDataText .= "<li> <b>Name: </b>" . $user[0];
      
      $deleteDataText .= "<br/> <li> <b>Gender: </b>";
      if ( $user[1] == "male" ){
	      $deleteDataText .= "Male";
	    } else if ( $user[1] == "female" ) {
	      $deleteDataText .= "Female";
	    } else { $deleteDataText .= "ERROR!"; }
		
	    $deleteDataText .= "<br/> <li> <b>Age: </b>" . $user[2] . " year(s) old";
	    $deleteDataText .= "<br/> <li> <b>Email: </b>" . $user[3] . "<br/>";
	    $deleteDataText .= "</ul>";
  	    
  	  echo $deleteDataText;
  	?>
  	
    <a href="delete.php"> <input type="button" value="Yes"/> </a>
    <a href="../"> <input type="button" value="No"/> </a>
  	
  </body>

</html>
