<?php
  
  include '../libs/users-list.php';
  include '../libs/form-user.php';  

?>

<html>

  <head>
    <title>Update data</title>
  </head>

  <body>
  	
    <h2>Update data</h2> <hr/><br/>
  	
  	<p>*If you do not want to change something leave the input field still</p> <br/>
  	
    <?php
      form("update.php", "post", "edit");
  	?>
  	
  	<br/><br/>
  	

    <p>
      The last data was: <br/><br/><br/>
      *If you want to see the full information of every user
      <a href="../read/list.php">go to show data</a>
    </p>
  
    <?php
      printfUsersList( "short", "edit", "all" );  
  	?>
  	
  	

    <?php
  	  $get = 0;
  	  if ( isset( $_GET['id'] ) ) {
  	    $get = 1;
  	  }
  	?>
  	
    <script type="text/javascript">
  	  let get = <?php echo $get; ?>;
  	  
  	  if ( get == 1 ) {
  	    changingOption();
  	  }
  	</script>
  	
  </body>

</html>
