<?php
  require_once( '../read/read.php' );
  include_once( '../libs/helpers.php' );
  include_once( '../libs/form.php' );

  if ( isset( $_GET[ 'id' ] ) ) {
    if ( !array_key_exists( $_GET['id'], $usersList) ) {
      include_once( '../templates/_no-request.php' );
      die;
    }
  }
?>

<html>

  <head>
    <title>Update <?= $structName; ?></title>
  </head>

  <body>

    <h2>Update <?= $structName; ?></h2> <hr/><br/>

  	<p>*If you do not want to change something leave the input field still</p> <br/>

    <?php
      form("update.php", "post", "edit");
  	?>

  	<br/><br/>


    <p>
      The last data was: <br/><br/><br/>
      *If you want to see the full information of every <?= $structName; ?>
      <a href="../read/list.php">go to show data</a>
    </p>

    <?php
      printfUsersList( "short", "edit", "all" );  
  	?>

  </body>

</html>
