<?php if ( ! defined( 'ABSPATH' )  ) { die; } 

$prefix = '_gesustheme';

CSF::createCustomizeOptions( $prefix );

CSF::createSection( $prefix, array(
  'id'       => 'fields',
  'title'    => 'Gesus',
  'priority' => 1,
) ); 

//
CSF::createSection( $prefix, array(
  'parent'      => 'fields',
  'title'       => 'General',
  'fields'      => array(

    array(
      'id'      => 'bgcolor',
      'type'    => 'background',
      'title'   => 'Background color',
        'output'=> 'body, body:not(.page-template-elementor_canvas)',
        'output_mode' => 'background-color',
    ),

    array(
      'id'    => 'enb_share_tag',
      'type'  => 'switcher',
      'title' => 'Post tag & share',
    ),

    array(
      'id'    => 'enb_single_nav',
      'type'  => 'switcher',
      'title' => 'Single post navigation',
    ),

    array(
      'id'    => 'enb_pagination',
      'type'  => 'switcher',
      'title' => 'Post pagination',
    ),

    array(
      'id'    => 'enb_rpost',
      'type'  => 'switcher',
      'title' => 'Related post',
    ),

    array(
      'id'    => 'enb_authbox',
      'type'  => 'switcher',
      'title' => 'Author box',
    ),

    array(
      'id'      => 'tag_title',
      'type'    => 'text',
      'title'   => 'Tag title',
      'default' => 'Related tag',
      'dependency' => array( 'enb_share_tag', '==', 'true' ),
    ),

    array(
      'id'      => 'share_title',
      'type'    => 'text',
      'title'   => 'Share title',
      'default' => 'Social share',
      'dependency' => array( 'enb_share_tag', '==', 'true' ),
    ),

    array(
      'id'      => 'related_title',
      'type'    => 'text',
      'title'   => 'Related post title',
      'default' => 'Related post',
      'dependency' => array( 'enb_rpost', '==', 'true' ),
    ),

    array(
      'id'      => 'auth_title',
      'type'    => 'text',
      'title'   => 'Author box title',
      'default' => 'Written by',
      'dependency' => array( 'enb_authbox', '==', 'true' ),
    ),

  )
) );

CSF::createSection( $prefix, array(
    'parent'      => 'fields',
    'title'       => 'Typography',
    'fields'      => array(
        array(
            'id'    => 'arch_body_fonts',
            'type'  => 'typography',
            'title' => 'Body Typography',
            'output' => 'body',

        ),
        array(
            'id'    => 'arch_h1_fonts',
            'type'  => 'typography',
            'title' => 'H1 Typography',
            'output' => 'h1',
        ),
        array(
            'id'    => 'arch_h2_fonts',
            'type'  => 'typography',
            'title' => 'H2 Typography',
            'output' => 'h2',
        ),
        array(
            'id'    => 'arch_h3_fonts',
            'type'  => 'typography',
            'title' => 'H3 Typography',
            'output' => 'h3',
        ),
        array(
            'id'    => 'arch_h4_fonts',
            'type'  => 'typography',
            'title' => 'H4 Typography',
            'output' => 'h4',
        ),
        array(
            'id'    => 'arch_h5_fonts',
            'type'  => 'typography',
            'title' => 'H5 Typography',
            'output' => 'h5',
        ),
        array(
            'id'    => 'arch_h6_fonts',
            'type'  => 'typography',
            'title' => 'H6 Typography',
            'output' => 'h6',
        ),
    )
) );
//
CSF::createSection( $prefix, array(
  'parent'      => 'fields',
  'title'       => 'Template Settings',
  'fields'      => array(

    array(
      'id'    => 'enb_pre',
      'type'  => 'switcher',
      'title' => 'Preloader',
    ),
      array(
      'id'    => 'enb_scroll',
      'type'  => 'switcher',
      'title' => 'Scroll Top',
    ),
    array(
      'id'      => 'prebg',
      'type'    => 'background',
      'title'   => 'Overlay background',
      'output'   => array('#preloader'),
      'output_important'      => true,
      'dependency' => array( 'enb_pre', '==', 'true' ),
    ),

    array(
      'id'          => 'opt_header',
      'type'        => 'select',
      'title'       => 'Home Header',
      'chosen'      => true,
      'multiple'    => false,
      'options'     => gesuselement_footer_select('gesus_builders'),
    ),

      array(
      'id'          => 'opt_page_header',
      'type'        => 'select',
      'title'       => 'Page Header',
      'chosen'      => true,
      'multiple'    => false,
      'options'     => gesuselement_footer_select('gesus_builders'),
    ),
 
    array(
      'id'          => 'opt_footer',
      'type'        => 'select',
      'title'       => 'Global Footer',
      'chosen'      => true,
      'multiple'    => false,
      'options'     => gesuselement_footer_select('gesus_builders'),
    ),
      array(
          'id'    => 'give_sidebar_switch',
          'type'  => 'switcher',
          'title' => 'Give Sidebar On/Off',
      ),
      array(
          'id'          => 'give_sidebar',
          'type'        => 'select',
          'title'       => 'Give Single Sidebar',
          'chosen'      => true,
          'dependency' => array( 'give_sidebar_switch', '==', 'true' ),
          'multiple'    => false,
          'options'     => gesuselement_footer_select('gesus_builders'),
      ),
    array(
      'id'          => 'sidebar',
      'type'        => 'select',
      'title'       => 'Sidebar',
      'chosen'      => true,
      'multiple'    => false,
      'options'     => gesuselement_footer_select('gesus_builders'),
    ),
      array(
      'id'          => 'sidebar_shop',
      'type'        => 'select',
      'title'       => 'Sidebar Shop',
      'chosen'      => true,
      'multiple'    => false,
      'options'     => gesuselement_footer_select('gesus_builders'),
    ),
     array(
      'id'          => 'footer_widget',
      'type'        => 'select',
      'title'       => 'Footer Widget',
      'chosen'      => true,
      'multiple'    => false,
      'options'     => gesuselement_footer_select('gesus_builders'),
    ),

    array(
      'type' => 'backup',
    ),

  )
) );

