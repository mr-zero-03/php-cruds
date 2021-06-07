<?php

  include_once ( '../../libs/form-builder.php' );
  include_once ( '../struct.php' );
  include_once ( 'users.php' );


  function form () {

    /*function defaultValue( $parm ){  //Function to reset to the default values if the user press the reset button (to not left the inputs empty)
      global $usersList;
      global $structFields;

      if ( isset( $_GET[ 'id' ] ) ) {
        $idDefault = $_GET['id'];

        
        echo $usersList[$idDefault][ $parm ];

        switch ( $parm ){
          case "name":
            echo $usersList[$idDefault]['name'];
          break;

                case "genderM":
                  if ( $usersList[$idDefault]['gender'] == "male" ){
                    echo 'checked="checked"';
                  }
                break;
                case "genderF":
                  if ( $usersList[$idDefault]['gender'] == "female" ){
                    echo 'checked="checked"';
                  }
                break;

                case "age":
                  echo $usersList[$idDefault]['age'];
                break;
                case "email":
                  echo $usersList[$idDefault]['email'];
                break;
              } 
            }
          }*/
  
  
    global $structName;
    global $struct;

    $formStruct = array();

    foreach ( $struct as $fieldName => $fieldAttributes ) {
      $formStruct[$fieldName] = array();

      foreach ( $fieldAttributes as $attribute => $value ) {

        $formStruct[$fieldName]['input']['type'] = $attribute === 'type' ? $value : 'text';
        $formStruct[$fieldName]['input']['id'] = $attribute === 'id' ? $value : $fieldName;
        $formStruct[$fieldName]['input']['name'] = $attribute === 'name' ? $value : $fieldName;
        $formStruct[$fieldName]['input']['value'] = $attribute === 'value' ? $value : '';
        $formStruct[$fieldName]['input']['placeholder'] = $attribute === 'placeholder' ? $value : ucfirst($fieldName);
        if ( isset( $formStruct[$fieldName]['input']['required'] ) ) { $formStruct[$fieldName]['required'] = ''; }

      }
    }
    return createForm($formStruct);
    
  }
/*
    $formStructureUser = array (

      $structFields[0] => array ( //Struct fields array asociativo
        'labelText' => ucfirst ( $structFields[0] ) . ': ',
        'labelPos' => 'start',

        'input' => array (
          'type' => 'text',
          'id' => $structFields[0],
          'name' => $structName['forcode'] . '[' . $structFields[0] . ']',
          'value' => '',
          'placeholder' => ucfirst ( $structFields[0] ) . ' (Without numbers)',
          'required' => ''
        ),
        'br' => '<br/><br/>'
      ),

      $structFields[1][1] => array (
        'labelText' => ucfirst( $structFields[1][1] ),
        'labelPos' => 'end',

        'input' => array (
          'type' => 'radio',
          'id' => $structFields[1][1],
          'name' => $structName['forcode'] . '[' . $structFields[1][0] . ']',
          'value' => $structFields[1][1],
          'required' => ''
        ),
      ),

      $structFields[1][2] => array (
        'labelText' => ucfirst( $structFields[1][2] ),
        'labelPos' => 'end',

        'input' => array (
          'type' => 'radio',
          'id' => $structFields[1][2],
          'name' => $structName['forcode'] . '[' . $structFields[1][0] . ']',
          'value' => $structFields[1][2],
          'required' => ''
        ),
        'br' => '<br/><br/>'
      ),

      $structFields[2] => array (
        'labelText' => ucfirst( $structFields[2] ) . ': ',
        'labelPos' => 'start',

        'input' => array (
          'type' => 'number',
          'id' => $structFields[2],
          'name' => $structName['forcode'] . '[' . $structFields[2] . ']',
          'value' => '',
          'placeholder' => ucfirst( $structFields[2] ),
          'min' => '0',
          'required' => ''
        ),
        'br' => '<br/><br/>'
      ),

      $structFields[3] => array (
        'labelText' => ucfirst( $structFields[3] ) . ': ',
        'labelPos' => 'start',
    
        'input' => array (
          'type' => 'email',
          'id' => $structFields[3],
          'name' => $structName['forcode'] . '[' . $structFields[3] . ']',
          'value' => '',
          'placeholder' => ucfirst( $structFields[3] ),
          'required'
        )
      )
    );

    return createForm($formStructureUser);    

  }
  */
  echo form ();
