<?php 
  require '../read/read.php';

  $jsonOldData = file_get_contents($filename);
  $oldUsersList = json_decode( $jsonOldData );
?>

<html>

  <head>
    <title>Update data</title>
  </head>

  <body>
  	
    <h2>Update data</h2> <hr/><br/>
  	
  	<p>*If you do not want to change something leave the input field still or empty</p> <br/>
    
    
    <form action="update.php" method="post"> <!--Form to change the user data-->
      
      
      <label for="selectId">ID: </label>
      <select id="selectId" name="selectId" onchange="changingOption();" required>
        <option selected value="">Choose your option</option>
        
        <?php
          $sizeUsersList = count( $oldUsersList );
          for ( $i=0; $i < $sizeUsersList; $i++ ){ ?> //Making the drop list analize how many users there are (to put the ID in the options)
            <option 
              <?php if ( isset($_GET['id']) && $_GET['id']==$i ) { echo "selected"; } ?> ><?php echo "$i"; ?>
            </option> 
          <?php
          }
        ?>
      </select> <br/><br/>
      
      
      <label for="name">Name: </label> <input type="text" id="name" name="name" value="" required/> <br/><br/>
      
      <input type="radio" id="male" name="gender" value="male" required/> <label for="male">Male</label>
      <input type="radio" id="female" name="gender" value="female" required/> <label for="female">Female</label> <br/><br/>
  
      <label for="age">Age: </label> <input type="number" id="age" name="age" value="" required/> <br/><br/>
      <label for="email">Email: </label> <input type="email" id="email" name="email" value="" required/>
      
      <br/><br/><br/>
      
      <input type="submit" value="Submit"/>
      <input type="reset" value="Reset"/>
      <a href="../"> <input type="button" value="Go back to the menu"/> </a>
    </form>
  	
  	<br/><br/><br/>
  	
  	
  	
  	<?php
  	  //Showing information of all the users
  	
      $editDataText = "The last data was: <br/><br/>";
      $editDataText .= "*If you want to see the full information of every user ";
      $editDataText .= '<a href="../read/show.php">go to show data</a>';
      
      $sizeUsersList = count( $oldUsersList );
  	  
  		for ( $i=0; $i < $sizeUsersList; $i++ ) {
  	      	
  	  	$oldUser = $oldUsersList[$i];
  	      	
  	  	$editDataText .= "<ul>";
  	  	$editDataText .= "<li> <b>ID: </b>" . $oldUser[0];
		  	$editDataText .= " <b>Name: </b>" . $oldUser[1];
	      
		  	$editDataText .= " <b>Gender: </b>";
		  	if ( $oldUser[2] == "male" ){
		    	$editDataText .= "M";
		    	$radioMale = 'checked="checked"';
		  	} else if ( $oldUser[2] == "female" ) {
		    	$editDataText .= "F";
		    	$radioFemale = 'checked="checked"';
		  	} else { $showDataText .= "ERROR!"; }
        
        $editDataText .= "</ul>";
  		}
  	    	
  		echo $editDataText;
  	    
  	?>
  	
  	
  	
  	<script type="text/javascript">
  	  
  	  function changingOption(){  //Function to change all the form if the ID that chooses the user in the drop list changes
  	    let sizeUsersList = <?php echo $sizeUsersList; ?>;  
  	    let oldUsersList = <?php echo json_encode($oldUsersList) ;?>; //Getting the users list values from PHP to JS using json_encode with the arrays
  	    
  	    let selectElement = document.getElementById("selectId");
  	    let id = selectElement.value;

  	    
  	    if ( id != "" ) {  
  	      document.getElementById("name").value = oldUsersList[id][1];  //Assigning on the inputs the user's value based on the id
  	    
  	      let gender = oldUsersList[id][2];
  	      if ( gender == "male" ) {
  	        document.getElementById("male").checked = "checked";
  	      } else if ( gender == "female" ) {
  	        document.getElementById("female").checked = "checked";
  	      }
        
          document.getElementById("age").value = oldUsersList[id][3];
          document.getElementById("email").value = oldUsersList[id][4];
          
  	    } else { //If your option in the drop list is "Choose your option" all the fields should be empty
  	    
  	      document.getElementById("name").value = "";
  	      document.getElementById("male").checked = "";
  	      document.getElementById("female").checked = "";
  	      document.getElementById("age").value = "";
          document.getElementById("email").value = "";
  	    }
  	  }
  	  
  	  changingOption();

  	</script>

  	
  	
  </body>

</html>
