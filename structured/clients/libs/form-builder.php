<?php
/* Steps to follow
3. Radio
4. Hidden (unique)
*/

include_once( '../boot.php' );
  function createLabel( $id, $text ) {
    $label = '<label for="' . $id . '">' . $text . '</label>';
    return $label;
  }

  /*function createFieldLabel( $field ) { //This maybe could analyze if the label exists
    $htmlLabel = '';
    $fieldLabel = $field[ 'label' ];

    if( isset( $fieldLabel ) ) {
      if( !isset( $fieldLabel[ 'text' ] ) ) {
        $fieldLabel[ 'text' ] = $field[ 'id' ];
      }
      if( isset( $fieldLabel[ 'text' ] ) ) {
        $fieldLabel[ 'pos' ] = 'start';
      }
    }

    $htmlLabel = createLabel( $field[ 'id' ], $field[ 'text' ] );

    return $htmlLabel;
  }*/

  function addLabel( $input, $labelText, $labelPos = 'start' ) {
    if( $labelPos !== 'start' || $labelPos !== 'end' ) { $labelPos = $labelPos; }

    $labelAdded = '';
    switch( $labelPos ) {
      case 'start':
        $labelAdded = $labelText . $input;
        break;
      case 'end':
        $labelAdded = $inputText . $label;
        break;
    }

    return $labelAdded;
  }

  function inputConditions( $conditions ) {
    $countConditions = count( $conditions );
    $createdCondition = '';
    $expression = array();
    for( $i = 0; $i < $countConditions; $i++ ) {

      $expression = explode( ':', $conditions[ $i ] );
      switch( $expression[ 0 ] ) {
        case 'min':
          $createdCondition .= 'min="' . $expression[ 1 ] . '" ';
          break;
        case 'max':
          $createdCondition .= 'max="' . $expression[ 1 ] . '" ';
          break;
        case 'equal':
          $createdCondition .= 'min="' . $expression[ 1 ] . '" max="' . $expression[ 1 ] . '" ';
          break;
        case 'regexp':
          $createdCondition .= 'pattern="' . $expression[ 1 ] . '" ';
          break;
      }

    }
    return $createdCondition;
  }

  /*function createRadio( $fieldAttributes ) {
    $options = $fieldAttributes[ 'options' ];
    $optionsLabel = $fieldAttributes[ 'label' ];
    $lineBreak = $fieldAttributes[ 'line_break' ];
    $label = '';
    $input = '';
    $brHtml = '';
    $radio = '';

    if( !isset( $optionsLabel[ 'pos' ] ) || $optionsLabel[ 'pos' ] !== 'end' || $optionsLabel[ 'pos' ] !== 'start' ) {
      $optionsLabel[ 'pos' ] = 'end';
    }

    $optionsSize = count( $options );
    for( $i = 0; $i < $optionsSize; $i++ ) {
      $label = createLabel( strtolower( $options[ $i ] ), $options[ $i ] );
      $input = 'value="' . $options[ $i ] . '" />';
      if( $lineBreak === true ) { $lineBreak = '<br/>'; }

      if( $optionsLabel[ 'pos' ] === 'end' ) { $radio .= $input . $label . $brHtml; }
      else if( $optionsLabel[ 'pos' ] === 'start' ) { $radio .= $label . $input . $brHtml; }
    }

    return $radio;
  }*/


  function createInput( $struct, $field ) { //Generic input creator
    $returnInput = '';
    $fieldAttributes = $struct[ 'fields' ][ $field ];

    if( isset( $fieldAttributes[ 'label' ] ) ) {
      if( !isset( $fieldAttributes[ 'label' ][ 'text' ] ) ) { $fieldAttributes[ 'label' ][ 'text' ] = $fieldAttributes[ 'id' ]; }
      $label = createLabel( $fieldAttributes[ 'id' ], $fieldAttributes[ 'label' ][ 'text' ] );
    }

    if( !isset( $fieldAttributes[ 'name' ] ) ) { $fieldAttributes[ 'name' ] = $fieldAttributes[ 'id' ]; }

    $input = '<input ';

    foreach( $fieldAttributes as $attribute => $value ) {

      switch( $attribute ) {
        case 'label':
          continue 2;
          break;
        case 'name':
          $value = $struct[ 'name' ][ 'forcode' ] . '[' . $field . ']';
          break;
        case 'required':
          if( $value === true ) { $value = 'required'; } else { continue; }
          break;
        case 'conditions':
          $value = inputConditions( $value );
          $input .= $value;
          continue 2;
          break;
      }

      $input .= $attribute . '="' . $value . '" ';
    }

    $input .= ' /> ';

    if( isset( $fieldAttributes[ 'label' ][ 'pos' ] ) ) {
      $returnInput = ( isset( $label ) ) ? addLabel( $input, $label, $fieldAttributes[ 'label' ][ 'pos' ] ) : $input;
    } else { $returnInput = ( isset( $label ) ) ? addLabel( $input, $label ) : $input; }

    return $returnInput;
  }


  function form( $struct/*, [$file, $method, $type], $defaultValue, $lineBreakSize = 2*/ ) {
    $form = '';

    $structFields = $struct[ 'fields' ];
    foreach( $structFields as $field => $fieldAttributes ) { //Inputs

      switch( $fieldAttributes[ 'type' ] ) {
        case 'radio':
          //$form .= createRadio( $fieldAttributes[ 'options' ], $fieldAttributes[ 'label' ], $fieldAttributes[ 'br' ] );
          break;
        default:
          $form .= createInput( $struct, $field );
      }

      if ( isset ( $struct[ 'form' ][ 'separator' ] ) ) { //Line break
        if( !isset( $struct[ 'form' ][ 'size' ] ) ) { $struct[ 'form' ][ 'size' ] = $lineBreakSize; }
        for( $i = 0; $i < $struct[ 'form' ][ 'size' ]; $i++ ) { $form .= $struct[ 'form' ][ 'separator' ]; }
      }

    }
    echo $form;
  }


form( $struct );
