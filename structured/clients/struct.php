<?php

  $yamlIsInstalled = ( array_search( "yaml", get_loaded_extensions() ) != false ) ? true : false;
  if( !$yamlIsInstalled ){ echo 'Please install <a href="https://www.php.net/manual/en/book.yaml.php">YAML</a>'; die(); }

  $file_name = 'struct.yaml';
  $yaml = yaml_parse_file( $referencePath . $file_name );
  $yamlStruct = $yaml[ 'struct' ];

  //Struct Name------
  if( ( !isset( $yamlStruct[ 'name' ][ 'singular' ] ) ) || ( !isset( $yamlStruct[ 'name' ][ 'plural' ] ) ) ) { echo 'ERROR: Your struct does not have a name, please give it in one. You have to, at least, add a <b>singular</b> and <b>plural</b> name'; die(); }
  if( !isset( $yamlStruct[ 'name' ][ 'properSingular' ] ) ){ $yamlStruct[ 'name' ][ 'properSingular' ] = ucfirst( $yamlStruct[ 'name' ][ 'singular' ] ); } //Proper Case
  if( !isset( $yamlStruct[ 'name' ][ 'properPlural' ] ) ){ $yamlStruct[ 'name' ][ 'properPlural' ] = ucfirst( $yamlStruct[ 'name' ][ 'plural' ] ); }

  if( !isset( $yamlStruct[ 'name' ][ 'lowerSingular' ] ) ){ $yamlStruct[ 'name' ][ 'lowerSingular' ] = strtolower( $yamlStruct[ 'name' ][ 'singular' ] ); } //lowercase
  if( !isset( $yamlStruct[ 'name' ][ 'lowerPlural' ] ) ){ $yamlStruct[ 'name' ][ 'lowerPlural' ] = strtolower( $yamlStruct[ 'name' ][ 'plural' ] ); }

  if( !isset( $yamlStruct[ 'name' ][ 'upperSingular' ] ) ){ $yamlStruct[ 'name' ][ 'upperSingular' ] = strtoupper( $yamlStruct[ 'name' ][ 'singular' ] ); } //UPPERCASE
  if( !isset( $yamlStruct[ 'name' ][ 'upperPlural' ] ) ){ $yamlStruct[ 'name' ][ 'upperPlural' ] = strtoupper( $yamlStruct[ 'name' ][ 'plural' ] ); }

  if( !isset( $yamlStruct[ 'name' ][ 'forcode' ] ) ){ $yamlStruct[ 'name' ][ 'forcode' ] = $yamlStruct[ 'name' ][ 'lowerSingular' ]; } //Used on the code (using lowercase by default)

  //Struct------
  $struct = $yamlStruct;
