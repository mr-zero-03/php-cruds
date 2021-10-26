<?php

  require_once '../read/read.php';
  include_once '../libs/users-list.php';
  include_once '../libs/button.php';

  $user = getUserByRequest ( $_POST );


  if ( !$user ) {
    include_once '../templates/_no-request.php';

    die;
  }

  $id = $user[0];

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

	    saveUserInfo( $user, "update" );
    ?>

  	<br/><br/>

    <?php
      createButtons( false, 'list', $id, $id, 'menu' );
    ?>

  </body>

</html>
