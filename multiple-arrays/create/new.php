<?php
  $filename = "../data.json";
  
  $usersList = array();
  
  if ( file_exists( $filename ) ){
    $getJsonUsersList = file_get_contents( $filename );
    $usersList = json_decode ( $getJsonUsersList, true );
  }

  $id = count( $usersList );
  
  $user = array(
    0 => $id,
    1 => $_POST['name'],
    2 => $_POST['gender'],
    3 => $_POST['age'],
    4 => $_POST['email']
  );
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
		  $dataSentText .= "<li> <b>ID: </b>" . $user[0];	    
		  $dataSentText .= "<li> <b>Name: </b>" . $user[1];
		
		  $dataSentText .= "<br/> <li> <b>Gender: </b>";
		  if ( $user[2] == "male" ){
		    $dataSentText .= "Male";
		  } else if ( $user[2] == "female" ){
		    $dataSentText .= "Female";
		  } else { $dataSentText .= "ERROR!"; }
		 
		  $dataSentText .= "<br/> <li> <b>Age: </b>" . $user[3] . " year(s) old";
		  $dataSentText .= "<br/> <li> <b>Email: </b>" . $user[4] . "<br/><br/><br/></ul>";
			
			if ( empty( $usersList ) == true ){
			  $usersList[0] = $user;
			} else {
			  array_push( $usersList, $user );
			}
			
			$jsonData = json_encode( $usersList );
			file_put_contents( $filename, $jsonData );
			
      $dataSentText .= "The data was sent correctly";
      	
      echo $dataSentText;      	
    ?>
    </p>
    
    <br/><br/>

		<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
    <a href="../read/list.php"> <input type="button" value="Show data"/> </a>
    <a href="../update/edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    
  </body>

</html>
