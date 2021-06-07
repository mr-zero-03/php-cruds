<?php

  $structure = array( //CLIENT
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
