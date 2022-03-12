<?php
namespace Elementor;

if ( ! function_exists('wts_insert_elementor') ){

	function wts_insert_elementor($atts){
	    if(!class_exists('Elementor\Plugin')){
	        return '';
	    }
	    if(!isset($atts['id']) || empty($atts['id'])){
	        return '';
	    }

	    $post_id = $atts['id'];

	    $response = Plugin::instance()->frontend->get_builder_content_for_display($post_id);
	    return $response;
	}

}

add_shortcode('INSERT_ELEMENTOR','Elementor\wts_insert_elementor');