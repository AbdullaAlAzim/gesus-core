<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class gesus_footer_elements extends Widget_Base {

    public function get_name() {
        return 'footer-elements';
    }
 
    public function get_title() {
        return __('Footer Elements', 'gesus');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['gesus-footer'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Content', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'gesus' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'Layout 1', 'gesus' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Layout 2', 'gesus' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
              
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );

         $this->add_control(
            'custom_logo_upload',
            [
                'label' => __( 'Choose Custom Logo', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,

            ]
        );

         $this->add_control(
            'footer_top_one',
            [
                'label' => esc_html__( 'Description', 'gesus' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                   'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => wp_kses_post( '<p>Copyright © <span>2021</span> by <a href="https://themeforest.net/user/gesus_theme">gesus_Theme.</a> All Rights Reserved.</p>', 'gesus' ),
             
            ]
        );

          $this->add_control(
            'footer_top_two',
            [
                'label' => esc_html__( 'Description', 'gesus' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                   'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => wp_kses_post( '<p>Copyright © <span>2021</span> by <a href="https://themeforest.net/user/gesus_theme">gesus_Theme.</a> All Rights Reserved.</p>', 'gesus' ),
             
            ]
        );

   $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __('Name', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Social Icons', 'gesus'),
            ]
        );
      $repeater->add_control(
            'url1',
            [
                'label' => __('Link 1', 'gesus'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

       $repeater->add_control(
            'icon1',
            [
                'label' => __( 'Icon', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-twitter',
                    'library' => 'brand',
                ],
            ]
        );

      $this->add_control(
            'member_list',
            [
                'label' => __('Social Icons', 'gesus'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __('Facebook', 'gesus'),
                    ],
                    [
                        'member_name' => __('Twitter', 'gesus'),
                    ],
                    [
                        'member_name' => __('Instagram', 'gesus'),
                    ],
                    [
                        'member_name' => __('Youtube', 'gesus'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );
     
        $this->end_controls_section();
        
    }
        
    protected function render(){

        $settings = $this->get_settings();

            $custom_logo_id = get_theme_mod( 'custom_logo' );

        if ( $settings['custom_logo_upload']['id'] ) {
            $url = wp_get_attachment_image( $settings['custom_logo_upload']['id'], 'full' );
        } else {
            $url = wp_get_attachment_image( $custom_logo_id, 'full' );
        }
      

            include dirname(__FILE__). '/' . $settings['layout']. '.php';
      
    }

}
Plugin::instance()->widgets_manager->register( new gesus_footer_elements() );
?>