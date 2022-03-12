<?php
function gesus_welcome_page(){
    require_once 'gesus-welcome.php';
}
function gesus_demo_importer_function(){
    admin_url( 'admin.php?page=gesus-demo-importer' );
}
add_action( 'admin_menu', 'gesus_admin_meu' );
function gesus_admin_meu() {
    // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    add_menu_page( 'Gesus', 'Gesus', 'administrator', 'gesus-admin-menu', 'gesus_welcome_page', 'dashicons-smiley', 2 );
    add_submenu_page('gesus-admin-menu', 'Theme Options', 'Theme Options', 'manage_options', 'customize.php' );
    add_submenu_page( 'gesus-admin-menu', esc_html__( 'Demo Importer', 'gesus' ), esc_html__( 'Demo Importer', 'gesus' ), 'administrator', 'gesus-demo-importer',  'gesus_demo_importer_function');
}