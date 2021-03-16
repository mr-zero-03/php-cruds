<?php
  $filename = "../data.json";
  
  $usersList = array();
  
  if ( file_exists( $filename ) ){
    $getJsonUsersList = file_get_contents( $filename );
    $usersList = json_decode ( $getJsonUsersList, true );
  }

  $id = count( $usersList );
?>

<!DOCTYPE html>

<html>

  <head>
    <title>Creating data</title>
  </head>

  <body>
  	
  	<h2>Creating data</h2> <hr/><br/><br/>
  	
  	<?php 
  	  echo "<b>User ID: </b>" . $id . "<br/><br/><br/>";
  	?>
  	
    <form action="new.php" method="post">
      <label for="name">Name: </label> <input type="text" id="name" name="name" required/> <br/><br/>
      
      <input type="radio" id="male" name="gender" value="male" required/> <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" required/> <label for="female">Female</label> <br/><br/>
  
      <label for="age">Age: </label> <input type="number" id="age" name="age" required/> <br/><br/>
      <label for="email">Email: </label> <input type="email" id="email" name="email" required/>
      
      <br/><br/><br/>
      
      <input type="submit" value="Submit"/>
      <input type="reset" value="Reset"/>
      <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    </form>
  	
  </body>

</html>
