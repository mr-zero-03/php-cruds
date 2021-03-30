<?php

  function createButtons( $create=null, $list=null, $update=null, $delete=null, $menu=null ){
    
    $buttons = "";
    
    if( $create ) {
      $buttons .= '<a href="../create/create.php"> <input type="button" value="Create user"/> </a>';
    } 
    
    if ( $list ) {      
      $buttons .= '<a href="../read/list.php"> <input type="button" value="List data"/> </a>';  
    }
  
    if ( $update !== false ) {
      $buttons .= "<a href='../update/edit.php";
      if ( is_numeric( $update ) ) { $buttons .= "?id=$update"; }      
      $buttons .= "'> <input type='button' value='Update data'/> </a>";
    }
    
    if ( $delete !== false ) {
      $buttons .= "<a href='../delete/confirm.php";
      if ( is_numeric( $delete ) ) { $buttons .= "?id=$delete"; }      
      $buttons .= "'> <input type='button' value='Delete data'/> </a>";
    }
    
    if ( $menu ) {
      $buttons .= '<a href="../"> <input type="button" value="Go back to the menu"/> </a>';
    }
    
    echo $buttons;
  
  }
?>
