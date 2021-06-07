<?php

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

  $structFields = array (
    0 => 'name',
    1 => array ( 'gender', 'male', 'female' ),
    2 => 'age',
    3 => 'email'
    
  );
