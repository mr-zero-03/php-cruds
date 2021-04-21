<?php
  require_once( '../read/read.php' );
  include_once( '../libs/helpers.php' );
  include_once( '../libs/button.php' );

  $user = getUserByRequest ( $_POST[ 'client' ] );


  if ( !$user ) {
    include_once( '../templates/_no-request.php' );
    die;
  }

  $id = $user['id'];
?>


<html>

  <head>
    <title>Data <?= $structName; ?></title>
  </head>

  <body>

    <h2>Data <?= $structName; ?></h2> <hr/><br/>

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
