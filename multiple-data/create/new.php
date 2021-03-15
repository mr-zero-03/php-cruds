<?php
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $age = $_POST['age'];
  $email = $_POST['email'];

  $filename = "../data.db";
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
		$dataSentText .= "<li> <b>Name: </b>" . $name;
		
		$dataSentText .= "<br/> <li> <b>Gender: </b>";
		if ( $gender == "male" ){
		  $dataSentText .= "Male";
		} else {
		  $dataSentText .= "Female";
		}
		
		$dataSentText .= "<br/> <li> <b>Age: </b>" . $age . " year(s) old";
		$dataSentText .= "<br/> <li> <b>Email: </b>" . $email . "<br/><br/><br/></ul>";
				
	    if( file_exists( $filename ) ){
          $dataSentText .= "The data was sent before, delete or update it";
      	} else {
      	  $data = $name.",".$gender.",".$age.",".$email;
       	  file_put_contents( $filename, $data );
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
