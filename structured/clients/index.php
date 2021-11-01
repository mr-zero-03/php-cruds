<?php
  include_once( 'boot.php' );
?>

<!DOCTYPE html>

<html>

  <head>
    <title>CRUD For <?= $struct['name']['properPlural']; ?></title>
  </head>

  <body>

    <h1>CRUD For <?= $struct['name']['properPlural']; ?></h1>

    <hr/>

    <p>
      CRUD made for <?= $struct['name']['lowerPlural']; ?>.
    </p>

    <ol>
	    <li> <a href="create/new.php">Create a new <?= $struct['name']['lowerSingular']; ?></a> </li>
	    <li> <a href="read/list.php">Read a <?= $struct['name']['lowerSingular']; ?></a> </li>
	    <li> <a href="update/edit.php">Update a <?= $struct['name']['lowerSingular']; ?></a> </li>
	    <li> <a href="delete/confirm.php">Delete a <?= $struct['name']['lowerSingular']; ?></a> </li>
    </ol>

    <a href="../">Go back to the Multiple Structs CRUDs selection</a>

  </body>

</html>
