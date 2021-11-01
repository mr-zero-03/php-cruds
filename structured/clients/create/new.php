<?php
  include_once ( '../boot.php' );
?>

<!DOCTYPE html>

<html>

  <head>
    <title>Creating <?= $struct['name']['properSingular']; ?></title>
  </head>

  <body>

  	<h2>Creating <?= $struct['name']['properSingular']; ?></h2> <hr/><br/><br/>

  	<?php
      form("create.php", "post", "new");
  	?>

  </body>

</html>
