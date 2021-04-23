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
