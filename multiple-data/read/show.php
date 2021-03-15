<?php 
  require 'read.php';
?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>
  	
  	<h2>Show data</h2> <hr/><br/>
  	
  	<p>
  	  <?php
  	    $data = file_get_contents($filename);
  	    list( $name, $gender, $age, $email ) = explode( ",", $data );
  	       
  	    $showDataText = "The data you sent was: <br/><br/>"; 
  	    $showDataText .= "<ul>";
		$showDataText .= "<li> <b>Name: </b>" . $name;
		
		$showDataText .= "<br/> <li> <b>Gender: </b>";
		if ( $gender == "male" ){
		  $showDataText .= "Male";
		} else {
		  $showDataText .= "Female";
		}
		
		$showDataText .= "<br/> <li> <b>Age: </b>" . $age . " year(s) old";
		$showDataText .= "<br/> <li> <b>Email: </b>" . $email . "<br/></ul>";
  	    
  	    echo $showDataText;
  	    
  	  ?>
  	</p>
  	
  	<br/>
  	
  	<a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
