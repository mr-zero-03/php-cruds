<?php

  include_once ( '../boot.php' );

  $user = [];
  if ( !empty( $_POST[ $struct['name']['forcode'] ] ) ) {
    $user = getUserByRequest ( $_POST[ $struct['name']['forcode'] ] );
  }

  if ( !$user ) {
    include_once '../templates/_no-request.php';
    die;
  }

  $id = $user['id'];

	saveUserInfo( $user, "new" );

  include_once ( '../libs/helpers.php' );

?>

<!DOCTYPE html>

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

    <?php
      createButtons( 'create', 'list', $id, $id, 'menu' );
    ?>

  </body>

</html>
