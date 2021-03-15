<?php 
  require '../read/read.php';
  $oldData = file_get_contents( $filename );
?>

<html>

  <head>
    <title>Update data</title>
  </head>

  <body>
  	
  	<h2>Update data</h2> <hr/><br/>
  	
  	<?php
      echo "The last data was: " . $oldData . "<br/><br/>";
    ?>
  	
    <form action="update.php" method="post">
      <label for="data">New data: </label> <input type="text" id="data" name="data" value="<?php echo $oldData; ?>"required/>

      <br/><br/><br/>
      
      <input type="submit" value="Submit"/>
      <input type="reset" value="Reset"/>
      <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    </form>
  	
  </body>

</html>
