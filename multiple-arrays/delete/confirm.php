<?php 
  require '../read/read.php';
  
  $jsonData = file_get_contents($filename);
  $usersList = json_decode( $jsonData );
  $user = array();
?>

<html>

  <head>
    <title>Delete</title>
  </head>

  <body>
  	
  	<h2>Delete</h2> <hr/><br/>
  	
  	<p> 
  	  Please, choose what user(s) do you want to delete
  	</p>
  	
  	<p>
  	  *If you want to see the full information of every user <a href="../read/show.php">go to show data</a>
  	</p> <br/><br/>
  	
  	
  	<form action="delete.php" method="get" name="deleteForm">
  	  
  	  <input type="checkbox" id="selectAll" name="selectAll" onclick="selectAllCheckbox();"> <label for="selectAll"><b>Select all users</b></label> <br/><br/>
  	  
  	  <?php
        $sizeUsersList = count( $usersList );
        
        for ( $i=0; $i < $sizeUsersList; $i++ ){  //Making the checkbox analize how many users there are
          $user = $usersList[$i];
          ?>  
            
            <input type="checkbox" id="<?php echo $i; ?>" name="<?php echo $i; ?>" value="<?php echo $i; ?>">
            
            <label for="<?php echo $i; ?>"> 
              <?php 
                $genderText = $user[2] == "male" ? "M" : "F";
                echo "<b>ID:</b> " . $user[0] . " <b>Name:</b> " . $user[1] . " <b>Gender:</b> " . $genderText . "<br/><br/>";
              ?> 
            </label>
            
            <?php
          }
      ?>
  	  
  	  <a href="delete.php"> <input type="button" value="Delete"/> </a>
      <a href="../"> <input type="button" value="No, go back"/> </a>
  	</form>

  	
  	<script type="text/javascript">
  	  let sizeUsersList = <?php echo $sizeUsersList; ?>  	  
  	  let formElement = document.forms.deleteForm.elements;
  	  
  	  function selectAllCheckbox(){
  	    for ( let i=0; i<=sizeUsersList; i++ ){
          if ( formElement[i].type == "checkbox" ) {
            formElement[i].checked = formElement[0].checked ; 
          }  
  	    }
  	  }
  	  
  	  
  	</script>
  	
  	
  </body>

</html>
