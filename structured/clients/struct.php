<?php

  $file_name = 'struct.yaml';
  $yaml = yaml_parse_file( $referencePath . $file_name );
  $yamlStruct = $yaml[ 'struct' ];

  //Struct Name------
  $singular = $yamlStruct[ 'singular_name' ];
  $plural = $yamlStruct[ 'plural_name' ];

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
  $struct = $yamlStruct[ 'fields' ];
