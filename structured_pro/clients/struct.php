<?php

  //Struct Name------
  $singular = 'Client';
  $plural = 'Clients';

  $structName = array (
    'properSingular' => $singular, //Proper Case
    'properPlural' => $plural,

    'lowerSingular' => strtolower ( $singular ), //lowercase
    'lowerPlural' => strtolower ( $plural ),

    'upperSingular' => strtoupper ( $singular ), //UPPERCASE
    'upperPlural' => strtoupper ( $plural ),

    'forcode' => strtolower ( $singular ) //Used on the code using lowercase
  );

  //Struct Fields------
  $struct = array( 
    'id' => array(
      'type' => 'id',
      'name' => 'id',
      'required' => ''
    ),
    
    'name' => array(
      'type' => 'text',
      'name' => 'name',
      'required' => ''
    ),
    
    'gender' => array(
      'type' => 'radio',
      'options' => array ('male', 'female'),
      'name' => 'gender',
      'required' => ''
    ),
    
    'age' => array(
      'type' => 'number',
      'name' => 'age',
      'required' => ''
    ),
    
    'email' => array(
      'type' => 'email',
      'name' => 'email',
      'required' => ''
    )

  );
