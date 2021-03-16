<?php 
  require '../read/read.php';
  
  $user = array(
    0 => $_POST['selectId'],
    1 => $_POST['name'],
    2 => $_POST['gender'],
    3 => $_POST['age'],
    4 => $_POST['email']
  );

  $idChoosed = $_POST['selectId'];
  $jsonOldData = file_get_contents( $filename );
  $usersList = json_decode ( $jsonOldData );
  $oldUser = $usersList[ $idChoosed ];
  
  
  $nameText = "<li> <b>Name: </b>" . $user[1];
  $genderText = "<br/> <li> <b>Gender: </b>";
  $genderText .= $user[2] == "male" ? "Male" : "Female";
  $ageText = "<br/> <li> <b>Age: </b>" . $user[3] . " year(s) old";
  $emailText = "<br/> <li> <b>Email: </b>" . $user[4];
?>

<html>

  <head>
    <title>Data updated</title>
  </head>

  <body>
  	
    <h2>Data updated</h2> <hr/><br/>
  	
  	<p> 
	  <?php
	    
	    $newDataCounter=0; $oldDataCounter=0;
	    
	    echo "<b>ID: </b>" . $user[0] . "<br/><br/>";
	    
	    $newDataText = "<u>The new data you sent was:</u> <br/>";
	    $oldDataText = "<br/><br/><br/><u>The data you have not change is:</u> <br/>";
	    
	    
	    if ( $user[1] != $oldUser[1] ) { //Name
	      $newDataText .= $nameText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $nameText;
	      $oldDataCounter=1;
	    }
	    
	    if ( $user[2] != $oldUser[2] ) { //Gender
	      $newDataText .= $genderText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $genderText;
	      $oldDataCounter=1;
	    }
	    
	    if ( $user[3] != $oldUser[3] ) { //Age
	      $newDataText .= $ageText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $ageText;
	      $oldDataCounter=1;
	    }
	    
	    if ( $user[4] != $oldUser[4] ) { //Email
	      $newDataText .= $emailText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $emailText;
	      $oldDataCounter=1;
	    }
	   
	   
	    if ( $newDataCounter == 0 ) {
	      $newDataText .= "<br/>*You have not change anything";
	    }
	    if ( $oldDataCounter == 0 ) {
	      $oldDataText .= "<br/>*You have change all";
	    }
	   
      echo $newDataText;
      echo $oldDataText;
      
      $usersList[$idChoosed] = $user;
      $jsonData = json_encode( $usersList );
     	file_put_contents( $filename, $jsonData );
    ?>
    </p>
  	
  	<br/>
    
    <a href="../read/list.php"> <input type="button" value="Show data"/> </a>
    <a href="edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>


