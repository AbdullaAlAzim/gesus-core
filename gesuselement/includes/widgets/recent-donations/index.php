<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_recent_donation extends Widget_Base
{

    public function get_name()
    {
        return 'gesus-recent-donation';
    }

    public function get_title()
    {
        return __('Recent Donations', 'gesus');
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
                'label' => __('Recent Donations', 'gesus'),
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
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'id_query',
            [
                'label' => __('Donations', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_posts('give_forms'),
                'multiple' => true,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'posts_per_page',
            [
                'label' => __('Posts Per Page', 'gesus'),
                'type' => Controls_Manager::NUMBER,
                'default' => 3,
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
  
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihiaai',
                'label' => __('Meta Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-blog-post .gesus-post-content .gesus-post-author a',
            ]
        );

        $this->add_control(
            'post_inhaa_color',
            [
                'label' => __('Meta Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-blog-post .gesus-post-content .gesus-post-author a i, {{WRAPPER}} .gesus-blog-post .gesus-post-content .gesus-post-author a, {{WRAPPER}} .gesus-blog-post .gesus-post-content .link' => 'color: {{VALUE}}',
                ],
            ]
        );
   
        $this->add_control(
            'post_title_color',    
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,        
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-blog-post .gesus-post-content .post-title' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-blog-post .gesus-post-content .post-title',
            ]
        );

           $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tctih',
                'label' => __('Content Typography', 'gesus'),   
                'condition' => [
                    'layout' => 'layout2',
                ],
                'selector' => '{{WRAPPER}} .gesus-blog-heading .heading-right, {{WRAPPER}} .gesus-blog-card .gesus-post-content p, {{WRAPPER}} .author-profile span',
            ]
        );


           $this->add_control(
            'post_des_color',
            [
                'label' => __('Excerpt Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-blog-post .gesus-post-content .post-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihexc',
                'label' => __('Excerpt Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-blog-post .gesus-post-content .link',
            ]
        );
    
     

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihbtn',
                'label' => __('Button Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-blog-post .gesus-btn',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testi_sub_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-blog-post .gesus-btn',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();

        $per_page = $settings['posts_per_page'];
        $id = $settings['id_query'];
        $query_args = array(
            'post_type' => 'give_forms',
            'posts_per_page' => $per_page,
            'post__in' => $id,
            'orderby' => 'post__in'
        );

        $wp_query = new \WP_Query($query_args);
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }

    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register(new gesus_recent_donation());
?>