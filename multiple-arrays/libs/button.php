<?php

  function createButtons( $create=null, $list=null, $update=null, $delete=null, $menu=null ) {

    $buttons = "";

    if( $create ) {
      $buttons .= '<button onclick="location.href=\'../create/create.php\';"/>Create data</button> ';
    }

    if ( $list ) {
      $buttons .= '<button onclick="location.href=\'../read/list.php\';"/>List data</button> ';
    }

    if ( $update !== false ) {
      $buttons .= "<button onclick='location.href=\"../update/edit.php";
      if ( is_numeric( $update ) ) { $buttons .= "?id=$update"; }
      $buttons .= "\";'>Update data</button> ";
    }

    if ( $delete !== false ) {
      $buttons .= "<button onclick='location.href=\"../delete/confirm.php";
      if ( is_numeric( $delete ) ) { $buttons .= "?id=$delete"; }
      $buttons .= "\";'>Delete data</button> ";
    }

    if ( $menu ) {
      $buttons .= '<a href="../"> <input type="button" value="Go back to the menu"/> </a>';
    }

    echo $buttons;

  }
?>
