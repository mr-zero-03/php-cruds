<?php

  include_once '../libs/button.php';

?>

<html>
  <head>
    <title>ERROR!</title>
  </head>

  <body>

    <h2>No data sent</h2> <hr/><br/>

    <p>You have not sent the necessary information to perform the action you were wating for. Please try again</p> <br/>

    <?php createButtons ( 'create', 'list', 'update', 'delete', 'menu' ); ?>

  </body>

</html>
