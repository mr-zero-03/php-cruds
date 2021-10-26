<?php

  include_once '../libs/users-info.php';
  include_once '../libs/button.php';

?>

<html>

  <?php

    if( !$existsUsers ) { ?>

    <head>
      <title>ERROR!</title>
    </head>

    <body>

      <h2>No file!</h2> <hr/><br/>

      <p>You have not created your first user yet, firts go ahead and create one</p> <br/>

      <?php createButtons( 'create', false, false, false, 'menu' ); ?>

    </body>

  <?php
    die();
  } ?>

</html>
