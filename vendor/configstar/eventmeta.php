<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_eventmeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Event Options',
  'post_type'    => ['event'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Event Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'event_time',
          'type'  => 'text',
          'title' => 'evet time',
      ),


    array(
    'id'    => 'opt-upload-2',
    'type'  => 'media',
    'title' => 'normal image',
  ),

  array(
    'id'    => 'spe_nam',
    'type'  => 'text',
    'title' => 'Speaker Name',
  ),


  )
) );

CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Event Single Page',
  'icon'   => 'fas fa-rocket',
  'fields' => array(


 array(
  'id'    => 'yuo_linkk',
  'type'  => 'text',
  'title' => 'Add Link',
  'default' =>'https://youtu.be/SS3zZ7Ma83M'
),

    array(
    'id'    => 'vd_img',
    'type'  => 'media',
    'title' => 'Video Background Image',
  ),

  array(
  'id'       => 'opt-wp-editor-3',
  'type'     => 'wp_editor',
  'title'    => 'Google Map Embed Link',
  'sanitize' => false,
),

  array(
  'id'       => 'fb_lnks',
  'type'     => 'text',
  'title'    => 'facebook Link',
  'default' =>  'https://facebook.com'
),


 array(
  'id'       => 'tw_lnks',
  'type'     => 'text',
  'title'    => 'Twitter Link',
  'default' =>  'https://Twitter.com'

),

 array(
  'id'       => 'pn_lnks',
  'type'     => 'text',
  'title'    => 'Pinterest Link',
  'default' =>  'https://www.pinterest.com'
  
),

 array(
  'id'       => 'ln_lnks',
  'type'     => 'text',
  'title'    => 'LinkedIn Link',
  'default' =>  'https://LinkedIn.com'
  
),
  array(
  'id'       => 'tbm_lnks',
  'type'     => 'text',
  'title'    => 'Tumblr Link',
  'default' =>  'https://www.tumblr.com'
  
),

  array(
  'id'       => 'evt_org',
  'type'     => 'textarea',
  'title'    => 'Event Orginizer',
 
  
),

   array(
  'id'       => 'evt_loc',
  'type'     => 'textarea',
  'title'    => 'Event Location',
 
  
),

 array(
  'id'        => 'opt-group-1',
  'type'      => 'group',
  'title'     => 'Speaker',
  'fields'    => array(
      array(
      'id'    => 'spe_name',
      'type'  => 'text',
      'title' => 'Speaker Name',
        ),

       array(
      'id'    => 'spe_desi',
      'type'  => 'text',
      'title' => 'Speaker Designation',
        ),
       array(
      'id'    => 'opt-upload-1',
      'type'  => 'media',
      'title' => 'Upload',
        ),

      array(
      'id'    => 'sp_fb',
      'type'  => 'text',
      'title' => 'Facebook',
         ),

      array(
      'id'    => 'sp_tw',
      'type'  => 'text',
      'title' => 'Twitter',
         ),

      array(
      'id'    => 'sp_you',
      'type'  => 'text',
      'title' => 'Youtube',
         ),
   
      ),
    ),

  )
) );



// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'my_taxonomy_options';

  //
  // Create taxonomy options
  CSF::createTaxonomyOptions( $prefix, array(
    'taxonomy'  => 'event_category',
    'data_type' => 'unserialize', 
  ) );
  // Create a section
  CSF::createSection( $prefix, array(
    'fields' => array(
      array(
        'id'    => 'date',
        'type'  => 'date',
        'title' => 'Date',
      ),
    )
  ) );

}




