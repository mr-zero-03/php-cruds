<?php

  require_once 'read.php';
  include_once '../libs/users-list.php';
  include_once '../libs/button.php';

  $method = $_REQUEST;

  if ( !array_key_exists("id", $method) || ( !is_numeric ( $method['id'] ) ) ) {
    include_once '../templates/_no-request.php';

    die;
  }

?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>

    <h2>Show data</h2> <hr/><br/>

    <?php
      $id = $method['id'];

      if ( printfUsersList("long", "show", $id) === false ) { ?>

        <p>The user you were waiting to see does not exist</p>

      <?php }
  	?>

  	<br/>

  	<?php
  	  createButtons( 'create', 'list', $id, $id, 'menu' );
  	?>

  </body>

</html>
