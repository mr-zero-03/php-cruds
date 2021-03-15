<?php
  $user = array ( 
    0 => $_POST['name'],
    1 => $_POST['gender'],
    2 => $_POST['age'],
    3 => $_POST['email']
  );

  $filename = "../data.json";
?>

<html>

  <head>
    <title>Data sent</title>
  </head>

  <body>
  
    <h2>Data sent</h2> <hr/><br/>
		
    <p> 
	  <?php
	    
	    $dataSentText = "The data you sent was: <br/><br/>";
	    $dataSentText .= "<ul>";
		  $dataSentText .= "<li> <b>Name: </b>" . $user[0];
		
		  $dataSentText .= "<br/> <li> <b>Gender: </b>";
		  if ( $user[1] == "male" ){
		    $dataSentText .= "Male";
		  } else if ( $user[1] == "female" ){
		    $dataSentText .= "Female";
		  } else { $dataSentText .= "ERROR!"; }
		 
		  $dataSentText .= "<br/> <li> <b>Age: </b>" . $user[2] . " year(s) old";
		  $dataSentText .= "<br/> <li> <b>Email: </b>" . $user[3] . "<br/><br/><br/></ul>";
				
	    if( file_exists( $filename ) ){
          $dataSentText .= "The data was sent before, delete or update it";
      	} else {
       	  $jsonData = json_encode( $user );
       	  file_put_contents( $filename, $jsonData );
          $dataSentText .= "The data was sent correctly";
      	}
      	
        echo $dataSentText;
      	
      ?>
    </p>
    
    <br/><br/>

    <a href="../read/show.php"> <input type="button" value="Show data"/> </a>
    <a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    
  </body>

</html>
