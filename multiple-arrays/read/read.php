<?php

  include_once '../libs/users-info.php';
  include_once '../libs/button.php';
  
?>

<html>
  
  <?php if( existsData() == false ) { ?>
    
    <head>
      <title>Data empty</title>
    </head>
    
    <body>
    
    <?php 
      if ( isset( $_GET['id'] ) ){
        $id = $_GET['id'];
        
        /*if ( array_key_exists ( $usersList[ $idReceived ] ) == false ){ ?>
          <h3>ERROR</h3> <br/>
  	      <p>You have to choose the user you want to see</p> <br/><br/>
        <?php }*/
      } else {
    ?>
    
        <h2>Data empty!</h2> <hr/><br/>
      
        <p>Error, you have not sent data yet</p>

  <?php 
      } 
  
    createButtons( 'create', false, false, false, 'menu' );
  
  ?>
  
  </body>  
  
  <?php
    die();
  }
  ?>
  
</html>
