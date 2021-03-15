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
  	    $data = file_get_contents( $filename );
  	    $user = json_decode( $data, true );

  	       
  	    $showDataText = "The data you sent was: <br/><br/>"; 
  	    $showDataText .= "<ul>";
		    $showDataText .= "<li> <b>Name: </b>" . $user[0];
		
		    $showDataText .= "<br/> <li> <b>Gender: </b>";
		    if ( $user[1] == "male" ){
		      $showDataText .= "Male";
		    } else if ( $user[1] == "female" ) {
		      $showDataText .= "Female";
		    } else { $showDataText .= "ERROR!"; }
		
		    $showDataText .= "<br/> <li> <b>Age: </b>" . $user[2] . " year(s) old";
		    $showDataText .= "<br/> <li> <b>Email: </b>" . $user[3] . "<br/></ul>";
  	    
  	    echo $showDataText;
  	    
  	  ?>
  	</p>
  	
  	<br/>
  	
  	<a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
