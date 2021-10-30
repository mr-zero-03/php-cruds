<?php
  include_once( '../boot.php' );
  require_once( $referencePath . 'read/read.php' );
?>

<html>

  <head>
    <title>List <?= $structName['properPlural']; ?></title>
  </head>

  <body>

  	<h2>List <?= $structName['properPlural']; ?></h2> <hr/><br/>

  	<p>
      The data you sent was:<br/>
      *Click on the <?= $structName['lowerSingular']; ?> if you want to see his data exclusively
    </p> <br/>

    <?php
      printfUsersList( "long", "list", "all" );
  	?>

  	<br/>

  	<?php
  	  createButtons( 'create', false, 'update', 'delete', 'menu' );
  	?>

  </body>

</html>
