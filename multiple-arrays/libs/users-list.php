<?php
  
  include_once 'users-info.php';

  
  function typeUpdatePrintfUsersList( $oldUser, $newUser, $template ) {  
    $userSize = count( $oldUser );
    
    $newDataText = "<u>The new data you sent was:</u> <br/>";
    $oldDataText = "<br/><br/><u>The data you have not change is:</u> <br/>";
    
    $text = explode( "\n", $template );
    
    $newDataCounter=0; $oldDataCounter=0;
    for ( $i=1; $i < $userSize; $i++ ) {
      if ( $newUser[$i] != $oldUser[$i] ) {  //Something have change
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
  
  
  
  function printfUsersList( $sizePrintf, $type, $idUser ) {
    global $usersList;
    
    if ( isset( $usersList ) ) {
      if ( $idUser === "all" || array_key_exists( $idUser, $usersList ) ) {
    
        global $sizeUsersList;
    
        $templateName="";
        if ( $sizePrintf == "long" ){
          $templateName = "../templates/users-list/long-list.template";
        } else if ( $sizePrintf == "short" ){
          $templateName = "../templates/users-list/short-list.template";
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
        
          if ( $type == "update" ) { $usersListCopy[$i] = getUserByRequest( $_POST ); }
      
          $genderText = $usersListCopy[$i][2] == "male" ? "Male" : "Female";
      
          $usersListReplace = array(
            '%ID%' => $usersListCopy[$i][0],
            '%NAME%' => $usersListCopy[$i][1],
            '%GENDER%' => $genderText,
            '%AGE%' => $usersListCopy[$i][3],
            '%EMAIL%' => $usersListCopy[$i][4]
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

?>
