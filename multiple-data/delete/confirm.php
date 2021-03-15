<?php 
  require '../read/read.php';
  
  $data = file_get_contents($filename);
  list( $name, $gender, $age, $email ) = explode( ",", $data );
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
      $deleteDataText .= "<li> <b>Name: </b>" . $name;
      
      $deleteDataText .= "<br/> <li> <b>Gender: </b>";
      if ( $gender == "male" ){
	    $deleteDataText .= "Male";
	  } else {
	    $deleteDataText .= "Female";
	  }
		
	  $deleteDataText .= "<br/> <li> <b>Age: </b>" . $age . " year(s) old";
	  $deleteDataText .= "<br/> <li> <b>Email: </b>" . $email . "<br/>";
	  $deleteDataText .= "</ul>";
  	    
  	  echo $deleteDataText;
  	?>
  	
    <a href="delete.php"> <input type="button" value="Yes"/> </a>
    <a href="../"> <input type="button" value="No"/> </a>
  	
  </body>

</html>
