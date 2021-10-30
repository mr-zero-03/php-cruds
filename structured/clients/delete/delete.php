<?php
  include_once( '../boot.php' );
  require_once( $referencePath . 'read/read.php' );

  $usersDelete = $_REQUEST;

  if ( empty($usersDelete) ) {
    include_once '../templates/_no-request.php';
    die;
  }
  
  $pluralDelete = false;
  if ( count ( $usersDelete ) > 1 && !isset ( $usersDelete['selectAll'] ) ) { $pluralDelete = true; }
?>

<html>

  <head>
    <title>Deleted 
      <?php 
        echo ( $pluralDelete ) ? $structName['properPlural'] : $structName['properSingular'];
      ?>
    </title>
  </head>

  <body>

  	<h2>Deleted 
  	  <?php 
        echo ( $pluralDelete ) ? $structName['properPlural'] : $structName['properSingular'];
      ?>
    </h2>
    
    <hr/><br/>

    <?php
      $usersToDeleteText = ""; $usersDontExistsText = "";

      foreach ( $usersDelete as $idDelete => $valueOn ) {
        if ( $idDelete === "selectAll" ) { continue; }

        if ( isset( $usersList[$idDelete]['id'] ) ){
          $usersToDeleteText .= "<li>" . $idDelete . "</li>";
          unset ( $usersList[$idDelete] );
        } else {
          $usersDontExistsText .= "<li>" . $idDelete . "</li>";
        }
      }
      $usersList = array_values( $usersList );


      if ( $usersToDeleteText != "" ) { ?>
        <p>
          <?php echo ( $pluralDelete ) ? 'Were' : 'Was'; ?> deleted the 
          <?php echo ( $pluralDelete ) ? $structName['properPlural'] : $structName['properSingular']; ?>
          with the ID<?php echo ( $pluralDelete ) ? 's' : '' ; ?>: 
          <br/> 
          <?php echo "<ul>" . $usersToDeleteText . "</ul>"; ?>
        </p>

      <?php } else { ?>
        <p>You have not sent valid IDs<p>
      <?php } ?>

      <br/>

      <?php if ( $usersDontExistsText != "" ) { ?>
        <p>ID<?php echo ( $pluralDelete ) ? 's' : '' ; ?> that you have sent but does not exists: <br/> <?php echo "<ul>" . $usersDontExistsText . "</ul>"; ?> </p>
      <?php } ?>

      <?php if ( $usersList == null ) {

        unlink( $filename ); ?>
        <p><b>All the users have been deleted</b></p>
        <?php createButtons( 'create', false, false, false, 'menu' );

      } else {
        for ( $i=0; $i < count($usersList); $i++ ){  //Reassigning the IDs
          $usersList[$i]['id'] = $i;
        }
        saveUserInfo( $usersList, "delete" );

        createButtons( 'create', 'list', 'update', 'delete', 'menu' );

      }
    ?>

  </body>

</html>
