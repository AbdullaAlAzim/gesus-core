<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_event_cattt extends Widget_Base
{

    public function get_name()
    {
        return 'sermons-event';
    }

    public function get_title()
    {
        return __('Sermons Event', 'gesus');
    }

    public function get_categories()
    {
        return ['gesuselement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Sermons Slider', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Events Schedule', 'gesus' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Event Schedule', 'gesus' ),
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
            'content_sty',
            [
                'label' => __('Style', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_inhaa_color',
            [
                'label' => __('Meta Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-events-items .events-content p span, {{WRAPPER}} .gesus-events-items .events-content p, {{WRAPPER}} .gesus-events-items .events-content .date' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihiaai',
                'label' => __('Meta Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-events-items .events-content p span, {{WRAPPER}} .gesus-events-items .events-content p, {{WRAPPER}} .gesus-events-items .events-content .date',
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-section-title p',
            ]
        );

         $this->add_control(
            'post_tsubitle_color',
            [
                'label' => __('Sub Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-events-items .events-content .title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subttih',
                'label' => __('Sub Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-events-items .events-content .title',
            ]
        );


        $this->add_control(
            'post_des_color',
            [
                'label' => __('Excerpt Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-events-items .events-content .link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihexc',
                'label' => __('Excerpt Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-events-items .events-content .link',
            ]
        );
        $this->add_control(
            'post_btn_color',
            [
                'label' => __('Button Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc .btn-2, {{WRAPPER}} .gesus-events-tabs li a.active' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => __( 'Button Box Shadow', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-events-tabs li a.active',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihbtn',
                'label' => __('Button Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-events-tabs li a',
            ]
        );

        $this->add_control(
            'mao_options',
            [
                'label' => __( 'Meta BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'teosti_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-events-items .events-content .date',
            ]
        );
         $this->add_control(
            'mo_options',
            [
                'label' => __( 'Button BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
         $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'ta_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-events-tabs li a.active',
            ]
        );


        $this->add_control(
            'c_options',
            [
                'label' => __( 'Card Border', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
         $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => __( 'Border', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-events-items:hover',
            ]
        );

          $this->add_control(
            'c_s',
            [
                'label' => __( 'Hover Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

           $this->add_control(
            'pssor',
            [
                'label' => __('Title Hover Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-events-items:hover .title' => 'color: {{VALUE}}',
                ],
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

Plugin::instance()->widgets_manager->register(new gesus_event_cattt());
?>