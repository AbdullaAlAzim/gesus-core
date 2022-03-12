<?php
/*
Plugin Name: Gesus Core
Plugin URI: https://maantheme.com/
Description: Gesus Core.
Author: Maan Theme
Author URI: https://maantheme.com/
Version: 1.0.0
*/

if ( ! defined( 'ABSPATH' ) ) exit;
define( 'GESUS_VERSION', '1.0.0' );
define( 'GESUS_PLUG_DIR', dirname(__FILE__).'/' );
define('GESUS_PLUG_URL', plugin_dir_url(__FILE__));
define('GESUS_DEMO_FILES', plugin_dir_url(__FILE__). 'vendor/demo/data/xml/');
define('GESUS_DEMO_SLIDER', plugin_dir_path(__FILE__). 'vendor/demo/data/xml/');

function cs_framework_init_check() {

    if( ! function_exists( 'cs_framework_init' ) && ! class_exists( 'CSFramework' ) ) {
         
          require_once GESUS_PLUG_DIR .'/vendor/codestar-framework/codestar-framework.php';
          require_once GESUS_PLUG_DIR .'/vendor/configstar/customiser.php';
          require_once GESUS_PLUG_DIR .'/vendor/configstar/pagemeta.php';
          require_once GESUS_PLUG_DIR . '/vendor/configstar/agendmeta.php';
          require_once GESUS_PLUG_DIR . '/vendor/configstar/eventmeta.php';
          require_once GESUS_PLUG_DIR . '/vendor/configstar/sermonmeta.php';
          require_once GESUS_PLUG_DIR .'/vendor/configstar/profile.php';
          require_once GESUS_PLUG_DIR .'/vendor/configstar/taxonomy.php';
          require_once GESUS_PLUG_DIR .'/vendor/admin-pages/admin.php';
          require_once GESUS_PLUG_DIR . '/vendor/demo/includes/demo-importer.php';

    }
 
    if( ! class_exists( 'GesusElement_Elementor_Addons' ) ) {
        require_once GESUS_PLUG_DIR .'/gesuselement/index.php';
        require_once GESUS_PLUG_DIR. '/helper/customiser-extra.php';
        require_once GESUS_PLUG_DIR. '/helper/cpt.php';
    }

}

add_action( 'plugins_loaded', 'cs_framework_init_check' );

function gesuselement_footer_select($type='') {

        $type = $type ? $type :'elementor_library';
        global $post;
        $args = array('numberposts' => -1,'post_type' => $type,);
        $posts = get_posts($args);  
        $categories = array(
        ''  => __( 'Select', 'gesus' ),
        );
        foreach ($posts as $pn_cat) {
            $categories[$pn_cat->ID] = get_the_title($pn_cat->ID);
        }
        return $categories;   
}

//elementor template
if (class_exists('ELEMENTOR')){
    add_action( 'template_redirect', function() {
        $instance = \Elementor\Plugin::$instance->templates_manager->get_source( 'local' );
        remove_action( 'template_redirect', [ $instance, 'block_template_frontend' ] );
    }, 9 );
}
?>