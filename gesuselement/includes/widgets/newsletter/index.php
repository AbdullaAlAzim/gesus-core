<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class gesus_newsletter_ss extends Widget_Base {

    public function get_name() {
        return 'gesus-newsletter';
    }

    public function get_title() {
        return __( 'Newsletter', 'gesus' );
    }
    public function get_categories() {
        return [ 'gesuselement-addons' ];
    }
    public function get_icon() {
        return 'eicon-person';
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
                        'title' => __( 'One', 'gesus' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Two', 'gesus' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );



        $this->add_control(
            'form',
            [
                'label' => __('Newsletter Shortcode One', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('[contact-form-7 id="2328" title="Newsletter Form"]', 'gesus'),
                'condition' => [
                    'layout' => 'layout1',
                ],
            ]
        );
        $this->add_control(
            'form1',
            [
                'label' => __('Newsletter Shortcode Two', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => __('[contact-form-7 id="2334" title="Newsletter2"]', 'gesus'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __(' Sub Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('50% discount for your first order', 'gesus'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Join our newsletter and get...', 'gesus'),
            ]
        );

          $this->add_control(
            'info',
            [
                'label' => __('Info', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('consectetur adipisicing elit, sed do eiusmod tempor incididunt laboret dolore magna aliqua. Ut enim minim veniam quis nostrud exercitation ullamco laboris nisi ut aliquip', 'gesus'),
            ]
        );
        
      
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title p.orange-color' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title p.orange-color',
            ]
        );

        $this->add_control(
            'subtitle_color',
            [
                'label' => __( 'SubTitle Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_fonts',
                'label' => __( 'SubTitle Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title h2',
            ]
        );

        $this->add_control(
            'inf_color',
            [
                'label' => __( 'Info Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,  
                'selectors' => [
                    '{{WRAPPER}} .gesus-subscribe-newsletter-wrp p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'inf_fonts',
                'label' => __( 'Info Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-subscribe-newsletter-wrp p, {{WRAPPER}} .gesus-subscribe .gesus-btn',
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __( 'Button Section', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );      
        $this->add_group_control(    
            Group_Control_Background::get_type(),
            [
                'name' => 'teams_socials_bngn',
                'types' => [ 'classic', 'gradient' ],  
                'selector' => '{{WRAPPER}} .gesus-subscribe-newsletter-wrp form p .gesus-btn, {{WRAPPER}} .gesus-subscribe .gesus-btn',
            ]
        );

        $this->add_group_control(    
            Group_Control_Background::get_type(),
            [
                'name' => 'teaam_socials_bngn',
                'types' => [ 'classic', 'gradient' ],   
                'selector' => '{{WRAPPER}} .gesus-subscribe-newsletter-wrp form p .gesus-btn:before, {{WRAPPER}} .gesus-subscribe .gesus-btn:before',
            ]
        );
  
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';


    }

    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register( new gesus_newsletter_ss() );
?>