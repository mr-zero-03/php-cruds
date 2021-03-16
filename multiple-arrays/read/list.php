<?php
  require 'read.php';
  
  $usersList = array();
  
  if ( file_exists( $filename ) ){
    $getJsonUsersList = file_get_contents( $filename );
    $usersList = json_decode ( $getJsonUsersList, true );
  }
    
  $user = array();
?>

<html>

  <head>
    <title>List data</title>
  </head>

  <body>
  	
  	<h2>List data</h2> <hr/><br/>
  	
  	<p>
  	  <?php
  	    $data = file_get_contents( $filename );
  	    $user = json_decode( $data, true );

		    $listDataText = "The data you sent was: <br/>";
		    $listDataText .= "*Click on the user if you want to see his data exclusively<br/><br/>";
		    
		    $sizeUsersList = count( $usersList );
  	    
  	    for ( $i=0; $i < $sizeUsersList; $i++ ) {
  	      
  	      $user = $usersList[$i];
  	      
  	      
  	      $listDataText .= "<a href='show.php?id=$user[0]'>";
  	      
  	      $listDataText .= "<ul>";
  	      $listDataText .= "<li> <b>ID: </b>" . $user[0];
		      $listDataText .= "<li> <b>Name: </b>" . $user[1];       
         
		      $listDataText .= "<br/> <li> <b>Gender: </b>";
		      if ( $user[2] == "male" ){
		        $listDataText .= "Male";
		      } else if ( $user[2] == "female" ) {
		        $listDataText .= "Female";
		      } else { $listDataText .= "ERROR!"; }
		
		      $listDataText .= "<br/> <li> <b>Age: </b>" . $user[3] . " year(s) old";
		      $listDataText .= "<br/> <li> <b>Email: </b>" . $user[4] . "<br/>";
		      $listDataText .= "</ul> </a> <br/>";
		      
		      //$listDataText .= "<a href='show.php?id=$user[0]'>S</a> </ul> <br/>"; 
  	    }
  	    
  	    echo $listDataText;
  	    
  	  ?>
  	</p>
  	
  	<br/>
  	
  	<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
  	<a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
