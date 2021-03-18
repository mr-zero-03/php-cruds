<?php
  require '../read/read.php';
  include '../form-user.php';
  

  $jsonOldData = file_get_contents($filename);
  $oldUsersList = json_decode( $jsonOldData );
?>

<html>

  <head>
    <title>Update data</title>
  </head>

  <body>
  	
    <h2>Update data</h2> <hr/><br/>
  	
  	<p>*If you do not want to change something leave the input field still</p> <br/>
  	
    <?php
      form("update.php", "post", "edit");
  	?>
  	
  	<br/><br/><br/>
  	
  	
  	
  	<?php
  	  //Showing information of all the users
  	
      $editDataText = "The last data was: <br/><br/>";
      $editDataText .= "*If you want to see the full information of every user ";
      $editDataText .= '<a href="../read/list.php">go to show data</a>';
      
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
  	
  	<?php
  	  $get = 0;
  	  if ( isset( $_GET['id'] ) ) {
  	    $get = 1;
  	  }
  	?>
  	<script type="text/javascript">
  	  let get = <?php echo $get; ?>;
  	  
  	  if ( get == 1 ) {
  	    changingOption();
  	  }
  	</script>
  	
  </body>

</html>
