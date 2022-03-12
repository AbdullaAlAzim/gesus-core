<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_sermonmeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Sermon Options',
  'post_type'    => ['sermons'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Audio Link',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
       array(
      'id'    => 'auddi_lnk',
      'type'  => 'upload',
      'title' => 'Audio Link',
    ),
  )
) );


CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Sermon Single page',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'sermo_speaker',
          'type'  => 'text',
          'title' => 'Speaker',
      ),

        array(
        'id'    => 'ser_l',
        'type'  => 'text',
        'title' => 'Sermons Video One Link',
      ),
        array(
        'id'    => 'ser_l_img',
        'type'  => 'media',
        'title' => 'Sermons Video One Image',
      ),
        array(
        'id'    => 'ser_2',
        'type'  => 'text',
        'title' => 'Sermons Video two Link', 
      ),
         array(
        'id'    => 'ser_2_img',
        'type'  => 'media',
        'title' => 'Sermons Video Two Image',
      ),

   )
) );

// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'azim_taxonomy_options';

  //
  // Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
    'taxonomy'  => 'sermons_category',
    'data_type' => 'serialize', 
  ) );
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(
      array(
        'id'    => 'upload',
        'type'  => 'upload',
        'title' => 'upload',
      ),
    )
  ) );



}
