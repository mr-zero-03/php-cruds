<?php 
  require '../read/read.php';

  $jsonOldData = file_get_contents($filename);
  $oldUser = json_decode( $jsonOldData );
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
      $editDataText .= "<li> <b>Name: </b>" . $oldUser[0];
      
      $radioMale=0; $radioFemale=0; 
      
      $editDataText .= "<br/> <li> <b>Gender: </b> ";
      if ( $oldUser[1] == "male" ){
	      $editDataText .= "Male";
	      $radioMale = 'checked="checked"';
	    } else if ( $oldUser[1] == "female" ){
	      $editDataText .= "Female";
	      $radioFemale = 'checked="checked"';
	    } else { $editDataText .= "ERROR!"; }
		
	    $editDataText .= "<br/> <li> <b>Age: </b>" . $oldUser[2] . " year(s) old";
	    $editDataText .= "<br/> <li> <b>Email: </b>" . $oldUser[3] . "<br/></ul>";
  	    
  	  echo $editDataText; 
  	  
    ?>
    
    <p>*If you do not want to change something leave the input field still or empty</p> <br/>
    
    <form action="update.php" method="post">
      <label for="name">Name: </label> <input type="text" id="name" name="name" value="<?php echo $oldUser[0]; ?>" required/> <br/><br/>
      
      <input type="radio" id="male" name="gender" value="male" <?php echo $radioMale; ?> required/> <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" <?php echo $radioFemale; ?> required/> <label for="female">Female</label> <br/><br/>
  
      <label for="age">Age: </label> <input type="number" id="age" name="age" value="<?php echo $oldUser[2]; ?>" required/> <br/><br/>
      <label for="email">Email: </label> <input type="email" id="email" name="email" value="<?php echo $oldUser[3]; ?>" required/>
      
      <br/><br/><br/>
      
      <input type="submit" value="Submit"/>
      <input type="reset" value="Reset"/>
      <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    </form>
  	
  </body>

</html>
