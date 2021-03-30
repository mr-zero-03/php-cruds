<?php

  include_once '../libs/users-info.php';
  
?>

<html>
  
  <?php if( existsData() == false ) { ?>
    
    <head>
      <title>Data empty</title>
    </head>
    
    <body>
    
    <?php 
      if ( isset( $_GET['id'] ) ){
        $idReceived = $_GET['id'];
        
        /*if ( array_key_exists ( $usersList[ $idReceived ] ) == false ){ ?>
          <h3>ERROR</h3> <br/>
  	      <p>You have to choose the user you want to see</p> <br/><br/>
        <?php }*/
      } else {
    ?>
    
        <h2>Data empty!</h2> <hr/><br/>
      
        <p>Error, you have not sent data yet</p>

  <?php } ?>
  
    <br/><br/> <a href="../create/create.php"> <input type="button" value="Create"/> </a>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  
  </body>  
  
  <?php
    die();
  }
  ?>
  
</html>
