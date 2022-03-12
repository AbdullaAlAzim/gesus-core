<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_blog_one_two extends Widget_Base
{

    public function get_name()
    {
        return 'gesus-blog';
    }

    public function get_title()
    {
        return __('Home Page Blog', 'gesus');
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
                'label' => __('Blog', 'gesus'),
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
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );

         
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                  'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => __( 'News & Blogs', 'gesus' ),
            ]
        );

         $this->add_control(
            'title2',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => __( 'Get Our Jesus Every News & Blog', 'gesus' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => __( 'NEWS & BLOGS', 'gesus' ),
            ]
        );
         $this->add_control(
            'info2',
            [
                'label' => __( 'Info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => __( 'NEWS & BLOGS', 'gesus' ),
            ]
        );

         $this->add_control(
            'info_details',
            [
                'label' => __( 'Section Summary', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => __( 'The practical knowledge of breathing techniques gives you balance and wisdom that will transform your life by unlocking the true potential of your mind and soul by bringing', 'gesus' ),
            ]
        );
        $this->add_control(
            'query_type',
            [
                'label' => __('Query type', 'gesus'),
                'type' => Controls_Manager::SELECT,
                'default' => 'individual',
                'options' => [
                    'category' => __('Category', 'gesus'),
                    'individual' => __('Individual', 'gesus'),
                ],
            ]
        );

        $this->add_control(
            'cat_query',
            [
                'label' => __('Category', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('category'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'category',
                ],
            ]
        );

        $this->add_control(
            'id_query',
            [
                'label' => __('Posts', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_posts('post'),
                'multiple' => true,
                'label_block' => true,
                'condition' => [
                    'query_type' => 'individual',
                ],
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
        $cat = $settings['cat_query'];
        $id = $settings['id_query'];


         if ($settings['query_type'] == 'category') {
            $query_argsss = array(
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'category',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ),
                ),
            );
        }

        if ($settings['query_type'] == 'individual') {
            $query_argsss = array(
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'post__in' => $id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_argsss);
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }

    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register(new gesus_blog_one_two());
?>