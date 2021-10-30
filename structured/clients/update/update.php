<?php
  include_once( '../boot.php' );
  require_once( $referencePath . 'read/read.php' );


  $user = getUserByRequest ( $_POST[ 'client' ] );


  if ( !$user ) {
    include_once( '../templates/_no-request.php' );
    die;
  }

  $id = $user['id'];
?>


<html>

  <head>
    <title>Updated <?= $structName['properSingular']; ?></title>
  </head>

  <body>

    <h2>Updated <?= $structName['properSingular']; ?></h2> <hr/><br/>

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
