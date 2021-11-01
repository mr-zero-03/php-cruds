<?php
  include_once( '../boot.php' );
  require_once( $referencePath . 'read/read.php' );

  if ( isset( $_GET[ 'id' ] ) ) {
    if ( !array_key_exists( $_GET['id'], $usersList) ) {
      include_once( '../templates/_no-request.php' );
      die;
    }
  }
?>

<html>

  <head>
    <title>Edit <?= $struct['name']['properSingular']; ?></title>
  </head>

  <body>

    <h2>Edit <?= $struct['name']['properSingular']; ?></h2> <hr/><br/>

  	<p>*If you do not want to change something leave the input field still</p> <br/>

    <?php
      form("update.php", "post", "edit");
  	?>

  	<br/><br/>


    <p>
      The last data was: <br/><br/><br/>
      *If you want to see the full information of every <?= $struct['name']['lowerSingular']; ?>
      <a href="../read/list.php">go to show data</a>
    </p>

    <?php
      printfUsersList( "short", "edit", "all" );  
  	?>

  </body>

</html>
