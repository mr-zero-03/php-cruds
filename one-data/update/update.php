<?php 
  require '../read/read.php';
  $data = $_POST['data'];
?>

<html>

  <head>
    <meta charset="UTF-8"/>
    <title>Data updated</title>
  </head>

  <body>
  	
  	<h2>Data updated</h2> <hr/><br/>
  	
  	<p>
      <?php 
        $dataUpdatedText = "The new data is: " . $data . "<br/><br/>";			
        $dataUpdatedText .= "The data was updated correctly";
        echo $dataUpdatedText;
      	       	
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


