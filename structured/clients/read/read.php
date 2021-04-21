<?php
  include_once( '../libs/users.php' );
  include_once( '../libs/button.php' );

  $structName = 'Client';
?>

<html>

  <?php

    if( !$existsUsers ) { ?>

    <head>
      <title>ERROR!</title>
    </head>

    <body>

      <h2>No file!</h2> <hr/><br/>

      <p>You have not created your first <?= $structName; ?> yet, firts go ahead and create one</p> <br/>

      <?php createButtons( 'create', false, false, false, 'menu' ); ?>

    </body>

  <?php
    die();
  } ?>

</html>
