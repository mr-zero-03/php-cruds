<?php
  $data = $_POST['data'];
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
	    
	    $dataSentText = "The data you sent was: " . $data . "<br/><br/>";
				
	    if( file_exists( $filename ) ){
          $dataSentText .= "The data was sent before, delete or update it";
      	} else {
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
