<?php

  function createForm ( $structure ) {

    $label = '';
    $input = '';

    foreach ( $structure as $key => $arrayNotUsed ) {

      if ( isset ( $structure [$key]['labelText'] ) && isset ( $structure [$key]['labelPos'] ) ) { //LABEL
        $label = '<label for="' . $structure [$key]['input']['id'] . '">' . $structure [$key]['labelText'] . '</label>';

        $structure [$key]['labelPos'] = strtolower ( $structure [$key]['labelPos'] );
        if ( $structure [$key]['labelPos'] === 'start' ) { $input .= $label; }
      }


      $input .= '<input '; //INPUT

      foreach ( $structure[$key]['input'] as $attribute => $value ) {

        $input .= $attribute . '="' . $value . '" ';

      }

      $input .= ' /> ';

      if ( isset ( $structure [$key]['labelPos'] ) ) { //LABEL END
        if ( $structure [$key]['labelPos'] === 'end' ) { $input .= $label; }
      }

      if ( isset ( $structure [$key]['br'] ) ) { $input .= $structure [$key]['br']; } //BR
    }
      
    return $input;

  }
