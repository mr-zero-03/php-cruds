<?php 
  require '../read/read.php';

  $oldData = file_get_contents($filename);
  list( $oldName, $oldGender, $oldAge, $oldEmail ) = explode( ",", $oldData );
?>

<html>

  <head>
    <title>Update data</title>
  </head>

  <body>
  	
    <h2>Update data</h2> <hr/><br/>
  	
  	<?php
      $editDataText = "The last data was: <br/>";
      $editDataText .= "<ul>";
      $editDataText .= "<li> <b>Name: </b>" . $oldName;
      $editDataText .= "<br/> <li> <b>Gender: </b> ";
      if ( $oldGender == "male" ){
	    $editDataText .= "Male";
	    $radioMale = 'checked="checked"';
	  } else {
	    $editDataText .= "Female";
	    $radioFemale = 'checked="checked"';
	  }
		
	  $editDataText .= "<br/> <li> <b>Age: </b>" . $oldAge . " year(s) old";
	  $editDataText .= "<br/> <li> <b>Email: </b>" . $oldEmail . "<br/></ul>";
  	    
  	  echo $editDataText; 
  	  
    ?>
    
    <p>*If you do not want to change something leave the input field still or empty</p> <br/>
    
    <form action="update.php" method="post">
      <label for="name">Name: </label> <input type="text" id="name" name="name" value="<?php echo $oldName; ?>" required/> <br/><br/>
      
      <input type="radio" id="male" name="gender" value="male" <?php echo $radioMale; ?> required/> <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" <?php echo $radioFemale; ?> required/> <label for="female">Female</label> <br/><br/>
  
      <label for="age">Age: </label> <input type="number" id="age" name="age" value="<?php echo $oldAge; ?>" required/> <br/><br/>
      <label for="email">Email: </label> <input type="email" id="email" name="email" value="<?php echo $oldEmail; ?>" required/>
      
      <br/><br/><br/>
      
      <input type="submit" value="Submit"/>
      <input type="reset" value="Reset"/>
      <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    </form>
  	
  </body>

</html>
