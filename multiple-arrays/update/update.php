<?php 

  require '../read/read.php';
  include '../libs/users-list.php';
 
  $id = $_POST['selectId'];
  
  $newUser = array(
    0 => $_POST['selectId'],
    1 => $_POST['name'],
    2 => $_POST['gender'],
    3 => $_POST['age'],
    4 => $_POST['email']
  );
  
?>

<html>

  <head>
    <title>Data updated</title>
  </head>

  <body>
  	
    <h2>Data updated</h2> <hr/><br/>
  	
  	<p><b>ID: </b><?php echo $id; ?></p>
	  
	  <?php
	    printfUsersList( "long", "update", $id );
	    
      $usersList[$id] = $newUser;
      $jsonData = json_encode( $usersList );
     	file_put_contents( $filename, $jsonData );
    ?>
  	
  	<br/><br/>
    
    <a href="../read/list.php"> <input type="button" value="List data"/> </a>
    <?php echo "<a href='edit.php?id=$id'> <input type='button' value='Update data'/> </a>"; ?>
    <?php echo "<a href='../delete/confirm.php?id=$id'> <input type='button' value='Delete data'/> </a>"; ?>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>
