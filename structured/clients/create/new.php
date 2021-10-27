<?php
  include_once( '../libs/form.php' );

  $structName = 'Client';
?>

<!DOCTYPE html>

<html>

  <head>
    <title>Creating <?= $structName; ?></title>
  </head>

  <body>

  	<h2>Creating <?= $structName; ?></h2> <hr/><br/><br/>

  	<?php
      form("create.php", "post", "new");
  	?>

  </body>

</html>
