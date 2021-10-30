<?php
  include_once ( '../boot.php' );
?>

<!DOCTYPE html>

<html>

  <head>
    <title>Creating <?= $structName['properSingular']; ?></title>
  </head>

  <body>

  	<h2>Creating <?= $structName['properSingular']; ?></h2> <hr/><br/><br/>

  	<?php
      form("create.php", "post", "new");
  	?>

  </body>

</html>
