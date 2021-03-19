<?php
  
  require '../read/read.php';
  
  $jsonData = file_get_contents( $filename );
  $usersList = json_decode( $jsonData );
  $sizeUsersList = count( $usersList );

  
  function typeUpdatePrintfUsersList( $oldUser, $template, $option ) {
    $newUser = array(
      0 => $_POST['selectId'],
      1 => $_POST['name'],
      2 => $_POST['gender'],
      3 => $_POST['age'],
      4 => $_POST['email']
    );
    
    if ( $option == "array" ) {
      return $newUser;

    } else if ( $option == "text" ) {
    
      $userSize = count( $oldUser );
    
      $newDataText = "<u>The new data you sent was:</u> <br/>";
      $oldDataText = "<br/><br/><u>The data you have not change is:</u> <br/>";
    
      $text = explode( "\n", $template );
    
      $newDataCounter=0; $oldDataCounter=0;
      for ( $i=1; $i < $userSize; $i++ ) {
        if ( $newUser[$i] != $oldUser[$i] ) {  //Have change
          $newDataText .= $text[$i];
          $newDataCounter=1;
        } else {  //Nothing have change
          $oldDataText .= $text[$i];
          $oldDataCounter=1;
        }
      }
    
      $newDataText .= $newDataCounter==0 ? "<br/>*You have not change anything<br/>" : "" ;
      $oldDataText .= $oldDataCounter==0 ? "<br/>*You have change all" : "";
    
      $template = $newDataText . $oldDataText;
    
      return $template;
    }
  }
  
  
  
  function printfUsersList( $sizePrintf, $type, $idUser ) {
    global $usersList;
    global $sizeUsersList;
    
    $templateName="";
    if ( $sizePrintf == "long" ){
      $templateName = "../templates/users-list/long-list.template";
    } else if ( $sizePrintf == "short" ){
      $templateName = "../templates/users-list/short-list.template";
    }    
    $template = file_get_contents( $templateName );
    

    if ( $idUser == "all" ){
      $i=0;
    } else {
      $i = $idUser;
      $sizeUsersList = $idUser + 1;
    } 
    
    $replacedText = "";
    for ( ; $i < $sizeUsersList; $i++ ) {
      $usersListReplace = $usersList;
      
      if ( $type == "update" ) { $usersListReplace[$i] = typeUpdatePrintfUsersList( "", "", "array" ); }
      
      $genderText = $usersListReplace[$i][2] == "male" ? "Male" : "Female";
      
      $usersListReplace = array(
        '%ID%' => $usersListReplace[$i][0],
        '%NAME%' => $usersListReplace[$i][1],
        '%GENDER%' => $genderText,
        '%AGE%' => $usersListReplace[$i][3],
        '%EMAIL%' => $usersListReplace[$i][4]
      );
      

      if ( ( $type == "list" ) || ( $type == "confirm" ) ) {
        if ( $type == "list" ) {
          $replacedText .= '<a href="show.php?id=' . $i . '">';
          
        } else if ( $type == "confirm" ) { 
        
          $replacedText .= '<input type="checkbox" id="' . $i . '" name="' . $i . '"value="' . $i . '" onclick="checkboxesVerification();"';
          if ( isset( $_GET['id']) && $_GET['id']==$i ) { $replacedText .= "checked"; }
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
          $replacedText = typeUpdatePrintfUsersList( $usersList[$i], $replacedText, "text" );
        }
        
      }
    
    }

    echo $replacedText;
  }

?>
