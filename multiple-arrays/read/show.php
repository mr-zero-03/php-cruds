<?php
  require 'read.php';
  
  $usersList = array();
  
  if ( file_exists( $filename ) ){
    $getJsonUsersList = file_get_contents( $filename );
    $usersList = json_decode ( $getJsonUsersList, true );
  }
  
  $id;
    
  $user = array();
?>

<html>

  <head>
    <title>Show data</title>
  </head>

  <body>
  	
  	<h2>Show data</h2> <hr/><br/>
  	
  	<?php
  	if ( isset( $_GET['id'] ) ) {
  	    $id = $_GET['id'];
  	    $user = $usersList[$id];

		    $showDataText = "The data of the user is: <br/><br/>"; 
  	      
 	      $showDataText .= "<ul> <li> <b>ID: </b>" . $user[0];
	      $showDataText .= "<li> <b>Name: </b>" . $user[1];

        $showDataText .= "<br/> <li> <b>Gender: </b>";
	      if ( $user[2] == "male" ){
	        $showDataText .= "Male";
	      } else if ( $user[2] == "female" ) {
	        $showDataText .= "Female";
	      } else { $showDataText .= "ERROR!"; }
		
	      $showDataText .= "<br/> <li> <b>Age: </b>" . $user[3] . " year(s) old";
	      $showDataText .= "<br/> <li> <b>Email: </b>" . $user[4] . "<br/><br/></ul>";
  	    
  	} else {
  	  $showDataText = "<h3>ERROR</h3> <br/>";
  	  $showDataText .= "You have to choose the user you want to see <br/><br/>";
  	}
  	
  	echo $showDataText;
  	
  	?>
  	
  	<br/>
  	
  	<a href="../create/create.php"> <input type="button" value="Create another user"/> </a>
  	<a href="list.php"> <input type="button" value="Go to list again"/> </a>
  	<?php if (isset( $_GET['id'] )) { echo "<a href='../update/edit.php?id=$user[0]'> <input type='button' value='Update data'/> </a>"; } ?>
    <?php if (isset( $_GET['id'] )) { echo "<a href='../delete/confirm.php?id=$user[0]'> <input type='button' value='Delete data'/> </a>"; } ?>
    <a href="../"> <input type="button" value="Go back to the menu"/> </a>
  	
  </body>

</html>




























