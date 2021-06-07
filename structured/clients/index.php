<?php
  include_once ( 'libs/struct-name.php' );
?>

<!DOCTYPE html>

<html>

  <head>
    <title>CRUD For <?= $structName['properPlural']; ?></title>
  </head>

  <body>

    <h1>CRUD For <?= $structName['properPlural']; ?></h1>

    <hr/>

    <p>
      CRUD made for <?= $structName['lowerPlural']; ?>.
    </p>

    <ol>
	    <li> <a href="create/new.php">Create a new <?= $structName['lowerSingular']; ?></a> </li>
	    <li> <a href="read/list.php">Read a <?= $structName['lowerSingular']; ?></a> </li>
	    <li> <a href="update/edit.php">Update a <?= $structName['lowerSingular']; ?></a> </li>
	    <li> <a href="delete/confirm.php">Delete a <?= $structName['lowerSingular']; ?></a> </li>
    </ol>

    <a href="../">Go back to the Multiple Structs CRUDs selection</a>

  </body>

</html>
