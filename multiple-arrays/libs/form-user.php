<?php
  
  include_once 'users-info.php';
  
?>


<html>

  <?php function form( $file, $method, $type ){ ?>
    
    <form action="<?php echo $file; ?>" method="<?php echo $method; ?>">
      
      <?php
        global $sizeUsersList;
        
        if ( $type == "create" ) { //CREATING A NEW USER, assigning him an ID
          echo "<b>User ID: </b>" . $sizeUsersList . "<br/>"; 
        
        
        
        } else if ( $type = "edit" ) { //EDITING AN EXISTING USER, asking for the ID 
      ?>
      
      <label for="id">ID: </label>
      <select id="id" name="id" value="" onchange="changingOption();" required>
        
        <option selected value="">Choose your option</option>
        
        <?php
          for ( $i=0; $i < $sizeUsersList; $i++ ){ ?> //Making the drop list analize how many users there are (to put the ID in the options)
            <option 
              <?php if ( isset($_GET['id']) && $_GET['id'] == $i ) { echo "selected"; } ?> ><?php echo "$i"; ?>
            </option> 
        <?php } ?>
        
      </select> <br/>
    
      <?php } ?>
    
      
      <html>
      
        <br/><br/>
        
        
        <?php
          function defaultValue( $parm ){  //Function to reset to the default values if the user press the reset button (to not left the inputs empty)
            global $usersList;
            
            if ( isset( $_GET['id'] ) ) {
              $idDefault = $_GET['id'];
              
              switch ( $parm ){
                case "name":
                  echo $usersList[$idDefault][1];
                break;
                
                case "genderM":
                  if ( $usersList[$idDefault][2] == "male" ){
                    echo 'checked="checked"';
                  }
                break;
                case "genderF":
                  if ( $usersList[$idDefault][2] == "female" ){
                    echo 'checked="checked"';
                  }
                break;
                
                case "age":
                  echo $usersList[$idDefault][3];
                break;
                case "email":
                  echo $usersList[$idDefault][4];
                break;
              } 
            }
          }
        ?>

        <label for="name">Name: </label> <input type="text" id="name" name="name" value="<?php defaultValue('name'); ?>" required/> <br/><br/>
      
        <input type="radio" id="male" name="gender" value="male" <?php defaultValue('genderM'); ?> required/> <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="female" <?php defaultValue('genderF'); ?> required/> <label for="female">Female</label> <br/><br/>
  
        <label for="age">Age: </label> <input type="number" id="age" name="age" value="<?php defaultValue('age'); ?>" required/> <br/><br/>
        <label for="email">Email: </label> <input type="email" id="email" name="email" value="<?php defaultValue('email'); ?>" required/>
      
        <br/><br/><br/>
      
        <input type="submit" value="Submit"/>
        <input type="reset" value="Reset"/>
        <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    
      </form>
    
  <?php } ?>
  
  
  <script type="text/javascript">
  	  
    function changingOption(){  //Function to change all the form if the ID that chooses the user in the drop list changes
  	  let sizeUsersList = <?php echo $sizeUsersList; ?>;  
  	  let usersList = <?php echo json_encode($usersList) ;?>; //Getting the users list values from PHP to JS using json_encode with the arrays
  	      
  	  let selectIdObj = document.getElementById("id");
  	  
  	  
  	  if ( selectIdObj.value != "" ) {  	    
  	    let id = selectIdObj.value;            
  	    
  	    document.getElementById("name").value = usersList[id][1];  //Assigning on the inputs the user's value based on the id
  	    
  	    let gender = usersList[id][2];
  	    if ( gender == "male" ) {
  	      document.getElementById("male").checked = "checked";
  	    } else if ( gender == "female" ) {
  	      document.getElementById("female").checked = "checked";
  	    }
        
        document.getElementById("age").value = usersList[id][3];
        document.getElementById("email").value = usersList[id][4];
          
  	  } else { //If your option in the drop list is "Choose your option" all the fields should be empty
  	    document.getElementById("name").value = "";
  	    document.getElementById("male").checked = "";
  	    document.getElementById("female").checked = "";
  	    document.getElementById("age").value = "";
        document.getElementById("email").value = "";
  	  }
  	}
  	     
  </script>      
      
</html>
