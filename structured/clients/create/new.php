<?php
  include_once ( '../libs/struct-name.php' );
  include_once ( '../libs/form.php' );
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
