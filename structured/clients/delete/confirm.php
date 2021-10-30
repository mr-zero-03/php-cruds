<?php
  include_once( '../boot.php' );
  require_once( $referencePath . 'read/read.php' );
?>

<html>

  <head>
    <title>Delete <?= $structName['properPlural']; ?></title>
  </head>

  <body>

  	<h2>Delete <?= $structName['properPlural']; ?></h2> <hr/><br/>

  	<p>
  	  Please, choose what <?= $structName['lowerSingular']; ?> or <?= $structName['lowerPlural']; ?> do you want to delete<br/><br/>
  	  *If you want to see the full information of every <?= $structName['lowerSingular']; ?> <a href="../read/show.php">go to show data</a>
  	</p> <br/><br/>


  	<form action="delete.php" method="get" name="deleteForm">

  	  <input type="checkbox" id="selectAll" name="selectAll" onclick="selectAllCheckboxes();"> <label for="selectAll"><b>Select all <?= $structName['lowerPlural']; ?></b></label> <br/><br/>

  	  <?php
  	    printfUsersList( "short", "confirm", "all" );
  	  ?>

  	  <input type="submit" value="Delete"/>
      <a href="../"> <input type="button" value="No, go back"/> </a>
  	</form>


  	<script type="text/javascript">

  	  let sizeUsersList = <?php echo $sizeUsersList; ?>;
  	  let formElement = document.forms.deleteForm.elements;

  	  function selectAllCheckboxes(){
  	    for ( let i=1; i<=sizeUsersList; i++ ){
          if ( formElement[i].type == "checkbox" ) {
            formElement[i].checked = formElement['selectAll'].checked;
            console.log(i);
          }
  	    }
  	  }

  	  function checkboxesVerification(){ //If all the checkboxes are checked the "select all" checkbox should be checked, otherwise not
  	    let verification=0;
  	    for ( let i=1; i <= sizeUsersList; i++ ){
  	      if ( (formElement[i].checked ) ) {
  	        verification++;
  	      }
  	    }

  	    if ( verification >= sizeUsersList ){ formElement['selectAll'].checked = "checked"; }
  	    else { formElement['selectAll'].checked = ""; }
  	  }

  	  checkboxesVerification();

  	</script>


  </body>

</html>
