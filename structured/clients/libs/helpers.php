<?php

  function typeUpdatePrintfUsersList( $oldUser, $newUser, $template ) {
    $newDataText = "<u>The new data you sent was:</u> <br/>";
    $oldDataText = "<br/><br/><u>The data you have not change is:</u> <br/>";

    $text = str_replace( "<ul>", " ", $template );
    $text = str_replace( "</ul>", " ", $text );
    $text = explode( "\n", $text );

    $newDataCounter=0; $oldDataCounter=0;

    $i = 0;
    foreach ( $oldUser as $key => $value ) {
      if ( $newUser[$key] != $oldUser[$key] ) {  //Something have change
        $newDataText .= $text[$i];
        $newDataCounter=1;
      } else {  //Nothing have change
        $oldDataText .= $text[$i];
        $oldDataCounter=1;
      }
      $i++;
    }

    $newDataText .= $newDataCounter==0 ? "<br/>*You have not change anything<br/>" : "" ;
    $oldDataText .= $oldDataCounter==0 ? "<br/>*You have change all<br/>" : "";

    $template = $newDataText . $oldDataText;

    return $template;
  }



  function printfUsersList( $sizePrintf, $type, $idUser ) {
    global $usersList;

    if ( isset( $usersList ) ) {
      if ( $idUser === "all" || array_key_exists( $idUser, $usersList ) ) {

        global $sizeUsersList;

        $templateName="";
        if ( $sizePrintf == "long" ){
          $templateName = "../templates/_clients-long-list.template";
        } else if ( $sizePrintf == "short" ){
          $templateName = "../templates/_clients-short-list.template";
        }
        $template = file_get_contents( $templateName );


        if ( $idUser === "all" ){
          $i=0;
        } else {
          $i = $idUser;
          $sizeUsersList = $idUser + 1;
        }


        $replacedText = "";
        for ( ; $i < $sizeUsersList; $i++ ) {

          $usersListCopy = $usersList;

          if ( $type == "update" ) { $usersListCopy[$i] = getUserByRequest( $_POST[ 'client' ] ); }

          $genderText = $usersListCopy[$i]['gender'] == "male" ? "Male" : "Female";

          $usersListReplace = array(
            '%ID%' => $usersListCopy[$i]['id'],
            '%NAME%' => $usersListCopy[$i]['name'],
            '%GENDER%' => $genderText,
            '%AGE%' => $usersListCopy[$i]['age'],
            '%EMAIL%' => $usersListCopy[$i]['email']
          );


          if ( ( $type == "list" ) || ( $type == "confirm" ) ) {
            if ( $type == "list" ) {
              $replacedText .= '<a href="show.php?id=' . $i . '">';

            } else if ( $type == "confirm" ) {

              $replacedText .= '<input type="checkbox" id="' . $i . '" name="' . $i . '"value="on" onclick="checkboxesVerification();"';
              if ( isset( $_GET['id']) && is_numeric($_GET['id']) && $_GET['id']==$i ) { $replacedText .= "checked"; }
              $replacedText .= '>';

              $replacedText .= '<label for="' . $i . '">';

            }
          }


          $replacedText .= strtr( $template, $usersListReplace );


          if ( ( $type == "list" ) || ( $type == "confirm" ) || ( $type == "update" )) {
            if ( $type == "list" ) {
              $replacedText .= "</a>";

            } else if ( $type == "confirm" ) {
              $replacedText .= "</label> <br/>";

              $replacedText = str_replace( "<li>", "", $replacedText );
              $replacedText = str_replace( "</li>", "", $replacedText );

            } else if ( $type == "update" ) {
              $replacedText = typeUpdatePrintfUsersList( $usersList[$i], $usersListCopy[$i], $replacedText );
            }

          }

        }

        echo $replacedText;

      } else {  //User(s) do(es) not exist
        return false;
      }
    } else {
      return false;
    }
  }



  function createButtons( $create=null, $list=null, $update=null, $delete=null, $menu=null ){

    $buttons = "";

    if( $create ) {
      $buttons .= '<button onclick="location.href=\'../create/new.php\';"/>Create data</button> ';
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
