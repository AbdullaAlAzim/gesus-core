<?php if ( ! defined( 'ABSPATH' )  ) { die; }

$prefix_page_opts = '_agentmeta';

CSF::createMetabox( $prefix_page_opts, array(
  'title'        => 'agenda Options',
  'post_type'    => ['agenda'],
  'show_restore' => false,
  'theme'=> 'light',
) );

//
// Create a section
//
CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Agenda Fields',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'ser_times',
          'type'  => 'text',
          'title' => 'Agend time',
      ),
       array(
          'id'    => 'ser_thems',
          'type'  => 'text',
          'title' => 'Agenda Theme',
      ),

       array(
          'id'    => 'ser_Tea',
          'type'  => 'text',
          'title' => 'Sermon Teachers',
      ),

       array(
          'id'    => 'ser_but',
          'type'  => 'text',
          'title' => 'Button Name',
      ),
  
   )
) );

CSF::createSection( $prefix_page_opts, array(
  'title'  => 'Agenda Single page',
  'icon'   => 'fas fa-rocket',
  'fields' => array(
      array(
          'id'    => 'sr_speaker',
          'type'  => 'text',
          'title' => 'Speaker',
      ),

        array(
        'id'    => 'a_link',
        'type'  => 'upload',
        'title' => 'Agenda Audio Link',
      ),

        array(
        'id'    => 'video_l',
        'type'  => 'text',
        'title' => 'Agenda Video One Link',
      ),
        array(
        'id'    => 'video_l_img',
        'type'  => 'media',
        'title' => 'Agenda Video One Image',
      ),
        array(
        'id'    => 'video_2',
        'type'  => 'text',
        'title' => 'Agenda Video two Link', 
      ),
         array(
        'id'    => 'video_2_img',
        'type'  => 'media',
        'title' => 'Agenda Video Two Image',
      ),
     
   )
) );