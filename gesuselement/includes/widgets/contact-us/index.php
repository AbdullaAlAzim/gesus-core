<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_contact extends Widget_Base
{

    public function get_name()
    {
        return 'gesus-contact';
    }

    public function get_title()
    {
        return __('Contact us', 'gesus');
    }

    public function get_categories()
    {
        return ['gesuselement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                 'default' => __('Drop Us a Line', 'gesus'),
            ]
        );

         $this->add_control(
            'sub_title',
            [
                'label' => __('SubTitle', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                 'default' => __('Your email address will not be published. Required fields are marked *', 'gesus'),
            ]
        );


         $this->add_control(
            'image_bg',
            [
                'label' => __( 'Background Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
    
        $this->add_control(
            'form',
            [
                'label' => __('Form Shortcode', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
            ]
        );
      
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'contact_title',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('New York Office', 'gesus'),
            ]
        );
        $repeater->add_control(
            'contact_des',
            [
                'label' => __('Description', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Maypole Crescent 70-80 Upper <br>St Norwich NR2 1LT', 'gesus'),
            ]
        );
       
           $repeater->add_control(
            'icon',
            [
                'label' => __( 'Section Background', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
           
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'contact_list',
            [
                'label' => __( 'Work List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'contact_title' => __( 'New York Office', 'gesus' ),
                    ],
                    [
                        'contact_title' => __( 'New York Office', 'gesus' ),
                    ],
                    [
                        'contact_title' => __( 'New York Office', 'gesus' ),
                    ],
                ],
                'title_field' => '{{{ contact_title }}}',
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
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'gesus'),    
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-contact-form-wrapper .contact-form .form-title h4, {{WRAPPER}} .gesus-events-organizer-items .content h4' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-contact-form-wrapper .contact-form .form-title h4, {{WRAPPER}} .gesus-events-organizer-items .content h4',
            ]
        );
    

      $this->add_control(
            'cc_color',
            [
                'label' => __('Content Color', 'gesus'),      
                'type' => \Elementor\Controls_Manager::COLOR,     
                'selectors' => [
                    '{{WRAPPER}} .gesus-events-organizer-items .content p, {{WRAPPER}} .gesus-contact-form-wrapper .contact-form p' => 'color: {{VALUE}}',
                ],
            ]
        );
      $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'cononts',
                'label' => __('Content Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-contact-form-wrapper .contact-form .form-title p',
            ]
        );

    $this->add_control(
            'more_optiosns',
            [
                'label' => __( 'Button BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

      $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Button BG', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .contact-form .btn.gesus-btn',
            ]
        );
    
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }

    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register(new gesus_contact());
?>