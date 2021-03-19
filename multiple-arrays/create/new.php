<?php
  
  $filename = "../data.json";
  
  $usersList = array();
  
  if ( file_exists( $filename ) ){
    $getJsonUsersList = file_get_contents( $filename );
    $usersList = json_decode ( $getJsonUsersList, true );
  }


  $id = count( $usersList );
  $user = array(
    0 => $id,
    1 => $_POST['name'],
    2 => $_POST['gender'],
    3 => $_POST['age'],
    4 => $_POST['email']
  );

  if ( empty( $usersList ) == true ){
	  $usersList[0] = $user;
	} else {
		array_push( $usersList, $user );
	}
			
	$jsonData = json_encode( $usersList );
	file_put_contents( $filename, $jsonData );
   
  
  include '../libs/users-list.php';

?>

<html>

  <head>
    <title>Data sent</title>
  </head>

  <body>
  
    <h2>Data sent</h2> <hr/><br/>
		
    <p>The data you sent was:</p> <br/>
	  
    <?php
      printfUsersList( "long", "new", $id );
    ?>
    
    <p>The data was sent correctly</p>

    
    <br/><br/>

		<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
    <a href="../read/list.php"> <input type="button" value="List users"/> </a>
    <?php echo "<a href='../update/edit.php?id=$user[0]'> <input type='button' value='Update data'/> </a>"; ?>
    <?php echo "<a href='../delete/confirm.php?id=$user[0]'> <input type='button' value='Delete data'/> </a>"; ?>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    
  </body>

</html>
