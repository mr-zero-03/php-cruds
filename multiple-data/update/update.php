<?php 
  require '../read/read.php';

  $oldData = file_get_contents( $filename );
  list( $oldName, $oldGender, $oldAge, $oldEmail ) = explode( ",", $oldData );
  
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $email = $_POST['email'];
     
  $nameText = "<li> <b>Name: </b>" . $name;
  $genderText = "<br/> <li> <b>Gender: </b>";
  $genderText .= $gender == "male" ? "Male" : "Female";
  $ageText = "<br/> <li> <b>Age: </b>" . $age . " year(s) old";
  $emailText = "<br/> <li> <b>Email: </b>" . $email;
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
	    $newDataText = "<u>The new data you sent was:</u> <br/>";
	    $oldDataText = "<br/><br/><br/><u>The data you have not change is:</u> <br/>";
	    
	    if ( $name != $oldName ) { //Name
	      $newDataText .= $nameText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $nameText;
	      $oldDataCounter=1;
	    }
	    
	    if ( $gender != $oldGender ) { //Gender
	      $newDataText .= $genderText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $genderText;
	      $oldDataCounter=1;
	    }
	    
	    if ( $age != $oldAge ) { //Age
	      $newDataText .= $ageText;
	      $newDataCounter=1;
	    } else {
	      $oldDataText .= $ageText;
	      $oldDataCounter=1;
	    }
	    
	    if ( $email != $oldEmail ) { //Email
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
      	
      	$data = $name.",".$gender.",".$age.",".$email;
      	file_put_contents( $filename, $data );
      ?>
    </p>
  	
  	<br/>
    
    <a href="../read/show.php"> <input type="button" value="Show data"/> </a>
    <a href="edit.php"> <input type="button" value="Update data"/> </a>
    <a href="../delete/confirm.php"> <input type="button" value="Delete data"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>


