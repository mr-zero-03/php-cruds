<?php
  include_once( '../boot.php' );
  require_once( $referencePath . 'read/read.php' );

  $method = $_REQUEST;

  if ( ( !array_key_exists( 'id', $method ) ) || ( !is_numeric ( $method[ 'id' ] ) ) ) {
    include_once( '../templates/_no-request.php' );

    die;
  }

?>

<html>

  <head>
    <title>Show <?= $struct['name']['properSingular']; ?></title>
  </head>

  <body>

    <h2>Show <?= $struct['name']['properSingular']; ?></h2> <hr/><br/>

    <?php
      $id = $method[ 'id' ];

      if ( printfUsersList("long", "show", $id) === false ) { ?>

        <p>The <?= $struct['name']['lowerSingular']; ?> you were waiting to see does not exist</p>

      <?php }
  	?>

  	<br/>

  	<?php
  	  createButtons( 'create', 'list', $id, $id, 'menu' );
  	?>

  </body>

</html>
