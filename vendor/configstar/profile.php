<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

//
// Set a unique slug-like ID
//
$prefix = '_yl_pfile';

//
// Create profile options
//
CSF::createProfileOptions( $prefix, array(
  'data_type' => 'serialize'
) );

//
// Create a section
//
CSF::createSection( $prefix, array(
  'title'  => 'Custom Yale Profile',
  'fields' => array(
    
    array(
      'id'    => 'avatar',
      'type'  => 'media',
      'title' => 'Avatar',
    ),

  )
) );
