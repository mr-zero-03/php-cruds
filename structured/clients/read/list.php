<?php
  require_once( 'read.php' );
  include_once( '../libs/helpers.php' );
  include_once( '../libs/button.php' );
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
