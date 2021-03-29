<?php
  
  include_once '../libs/users-info.php';
  include_once '../libs/save-user-info.php';  
  
  $user = array(
    0 => $sizeUsersList,
    1 => $_POST['name'],
    2 => $_POST['gender'],
    3 => $_POST['age'],
    4 => $_POST['email']
  );
	
	saveUserInfo( $user, "new" ); 
  
  
  include_once '../libs/users-list.php';

?>

<html>

  <head>
    <title>Data sent</title>
  </head>

  <body>
   
    <h2>Data sent</h2> <hr/><br/>
		
    <p>The data you sent was:</p> <br/>
	  
    <?php
      printfUsersList( "long", "new", $sizeUsersList );
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
