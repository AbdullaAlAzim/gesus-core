<?php

    class gesus_custom_post_type {

        function __construct() {

            add_action('init', array(&$this,'gesus_builder_post_type'));
            add_action('init', array(&$this,'create_builder_post_taxonomy'));
           
            add_action('init', array(&$this, 'create_agenda_cpt'));
            add_action('init', array(&$this, 'create_sermons_cpt'));
            add_action('init', array(&$this, 'create_event_cpt'));
            
            add_action('init', array(&$this, 'agenda_taxonomy'), 0);
            add_action('init', array(&$this, 'sermons_taxonomy'), 0);
            add_action('init', array(&$this, 'event_taxonomy'), 0);
        }
      // Builder Post Type
        function gesus_builder_post_type() {
        $labels = array(
            'name' => __('Gesus Builder', 'gesus'),
            'singular_name' => __('Gesus Builder', 'gesus'),
            'add_new' => __('Add builder', 'gesus'),
            'add_new_item' => __('Add builder', 'gesus'),
            'edit_item' => __('Edit builder', 'gesus'),
            'new_item' => __('New builder', 'gesus'),
            'all_items' => __('All builder', 'gesus'),
            'view_item' => __('View builder', 'gesus'),
            'search_items' => __('Search builder', 'gesus'),
            'not_found' => __('No builder found', 'gesus'),
            'not_found_in_trash' => __('No portfolio found in the trash', 'gesus'),
            'parent_item_colon' => '',
            'menu_name' => __('Gesus Theme Builder', 'gesus')
        );
        $args = array(
            'labels' => $labels,
            'public' => true,
            'menu_position' => 4,
            'menu_icon' => 'dashicons-admin-multisite',
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt','elementor'),
            'has_archive' => false,
        );
            register_post_type('gesus_builders', $args);
        }

        function create_builder_post_taxonomy() {
            $labels = array(
                'name' => __('Category', 'gesus'),
                'singular_name' => __('Category', 'gesus'),
                'search_items' => __('Search categories', 'gesus'),
                'all_items' => __('Categories', 'gesus'),
                'parent_item' => __('Parent category', 'gesus'),
                'parent_item_colon' => __('Parent category:', 'gesus'),
                'edit_item' => __('Edit category', 'gesus'),
                'update_item' => __('Update category', 'gesus'),
                'add_new_item' => __('Add category', 'gesus'),
                'new_item_name' => __('New category', 'gesus'),
                'menu_name' => __('Category', 'gesus'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'gesus_builder_cat'),
            );
            register_taxonomy('gesus_builder_cat', 'gesus_builders', $args);
        }
      

        // agenda Post type
        function create_agenda_cpt() {
            $labels = array(
                'name' => __('Agenda', 'gesus'),
                'singular_name' => __('Agenda', 'gesus'),
                'add_new' => __('Add agenda', 'gesus'),
                'add_new_item' => __('Add agenda', 'gesus'),
                'edit_item' => __('Edit agenda', 'gesus'),
                'new_item' => __('New agenda', 'gesus'),
                'all_items' => __('All agenda', 'gesus'),
                'view_item' => __('View agenda', 'gesus'),
                'search_items' => __('Search agenda', 'gesus'),
                'not_found' => __('No agenda found', 'gesus'),
                'not_found_in_trash' => __('No portfolio found in the trash', 'gesus'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('AGENDA', 'gesus')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'taxonomies' => array('agenda_category'),
                'supports' => array('title', 'editor','thumbnail','elementor'),
                'has_archive' => true,
            );
            register_post_type('agenda', $args);
        }


        function agenda_taxonomy() {
            $labels = array(
                'name' => __('Category', 'gesus'),
                'singular_name' => __('Category', 'gesus'),
                'search_items' => __('Search categories', 'gesus'),
                'all_items' => __('Categories', 'gesus'),
                'parent_item' => __('Parent category', 'gesus'),
                'parent_item_colon' => __('Parent category:', 'gesus'),
                'edit_item' => __('Edit category', 'gesus'),
                'update_item' => __('Update category', 'gesus'),
                'add_new_item' => __('Add category', 'gesus'),
                'new_item_name' => __('New category', 'gesus'),
                'menu_name' => __('Category', 'gesus'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'agenda_category'),
            );
            register_taxonomy('agenda_category', 'agenda', $args);
        }

         //sermons post type
         function create_sermons_cpt() {
            $labels = array(
                'name' => __('SERMONS', 'gesus'),
                'singular_name' => __('Sermons', 'gesus'),
                'add_new' => __('Add sermons', 'gesus'),
                'add_new_item' => __('Add sermons', 'gesus'),
                'edit_item' => __('Edit sermons', 'gesus'),
                'new_item' => __('New sermons', 'gesus'),
                'all_items' => __('All sermons', 'gesus'),
                'view_item' => __('View sermons', 'gesus'),
                'search_items' => __('Search sermons', 'gesus'),
                'not_found' => __('No sermons found', 'gesus'),
                'not_found_in_trash' => __('No sermons found in the trash', 'gesus'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('SERMONS', 'gesus')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-megaphone',
                'taxonomies' => array('sermons_category'),
                'supports' => array('title', 'editor','elementor','thumbnail'),
                'has_archive' => true,
            );
            register_post_type('sermons', $args);
        }

        function sermons_taxonomy() {
            $labels = array(
                'name' => __('Category', 'gesus'),
                'singular_name' => __('Category', 'gesus'),
                'search_items' => __('Search categories', 'gesus'),
                'all_items' => __('Categories', 'gesus'),
                'parent_item' => __('Parent category', 'gesus'),
                'parent_item_colon' => __('Parent category:', 'gesus'),
                'edit_item' => __('Edit category', 'gesus'),
                'update_item' => __('Update category', 'gesus'),
                'add_new_item' => __('Add category', 'gesus'),
                'new_item_name' => __('New category', 'gesus'),
                'menu_name' => __('Category', 'gesus'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'sermons_category'),
            );
            register_taxonomy('sermons_category', 'sermons', $args);
        }

          // event Post type
        function create_event_cpt() {
            $labels = array(
                'name' => __('Event', 'gesus'),
                'singular_name' => __('Event', 'gesus'),
                'add_new' => __('Add event', 'gesus'),
                'add_new_item' => __('Add event', 'gesus'),
                'edit_item' => __('Edit event', 'gesus'),
                'new_item' => __('New event', 'gesus'),
                'all_items' => __('All event', 'gesus'),
                'view_item' => __('View event', 'gesus'),
                'search_items' => __('Search event', 'gesus'),
                'not_found' => __('No event found', 'gesus'),
                'not_found_in_trash' => __('No event found in the trash', 'gesus'),
                'parent_item_colon' => '',
                'supports' => array('post-formats'),
                'menu_name' => __('EVENT', 'gesus')
            );
            $args = array(
                'labels' => $labels,
                'public' => true,
                'menu_position' => 6,
                'menu_icon' => 'dashicons-welcome-learn-more',
                'taxonomies' => array('event_category'),
                'supports' => array('title', 'editor','elementor','thumbnail'),
                'has_archive' => true,
            );
            register_post_type('event', $args);
        }



         function event_taxonomy() {
            $labels = array(
                'name' => __('Category', 'gesus'),
                'singular_name' => __('Category', 'gesus'),
                'search_items' => __('Search categories', 'gesus'),
                'all_items' => __('Categories', 'gesus'),
                'parent_item' => __('Parent category', 'gesus'),
                'parent_item_colon' => __('Parent category:', 'gesus'),
                'edit_item' => __('Edit category', 'gesus'),
                'update_item' => __('Update category', 'gesus'),
                'add_new_item' => __('Add category', 'gesus'),
                'new_item_name' => __('New category', 'gesus'),
                'menu_name' => __('Category', 'gesus'),
            );
            $args = array(
                'labels' => $labels,
                'hierarchical' => true,
                'show_ui' => true,
                'show_admin_column' => true,
                'rewrite' => array('slug' => 'event_category'),
            );
            register_taxonomy('event_category', 'event', $args);
        }


    }

    new gesus_custom_post_type();

