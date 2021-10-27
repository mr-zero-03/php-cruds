<?php
  $struct = "Client";
?>

<!DOCTYPE html>

<html>

  <head>
    <title>CRUD For <?= $struct; ?></title>
  </head>

  <body>

    <h1>CRUD For <?= $struct; ?></h1>

    <hr/>

    <p>
      CRUD made for <?= $struct; ?>.
    </p>

    <ol>
	    <li> <a href="create/new.php">Create a new <?= $struct ?></a> </li>
	    <li> <a href="read/list.php">Read a <?= $struct ?></a> </li>
	    <li> <a href="update/edit.php">Update a <?= $struct ?></a> </li>
	    <li> <a href="delete/confirm.php">Delete a <?= $struct ?>(s)</a> </li>
    </ol>

    <a href="../">Go back to the Multiple Structs CRUDs selection</a>

  </body>

</html>
