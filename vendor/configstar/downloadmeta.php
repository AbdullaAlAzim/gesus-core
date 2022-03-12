<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_downloadmeta';


CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'Download Options',
  'post_type'    => ['download'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Download Meta Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'preview_link',
          'type'  => 'link',
          'title' => 'Demo Preview Link',
      ),
  )
) );

