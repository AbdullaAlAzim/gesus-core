<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_footer_post extends Widget_Base
{

    public function get_name()
    {
        return 'footer-post';
    }

    public function get_title()
    {
        return __('Footer Post', 'gesus');
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
                'default' => 6,
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
            'post_title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-recent-post:hover .post-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .recent-post-single .recent-post-bio h6',
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
            $query_args = array(
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
            $query_args = array(
                'post_type' => 'post',
                'posts_per_page' => $per_page,
                'post__in' => $id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_args);

          echo '<div class="footer-items">
            <h3 class="footer-title">Recent Post</h3>';
        if ($wp_query->have_posts()) {
            while ($wp_query->have_posts()) {
                $wp_query->the_post();
                echo '<div class="gesus-recent-post">
                        <a href="' . get_the_permalink() . '" class="post-thumb"> '.get_the_post_thumbnail().'</a>
                        <div class="post-content">
                           <a href="' . get_the_permalink() . '" class="post-date">' . get_the_time('M j, Y') . '</a>
                            <a href="' . get_the_permalink() . '" class="post-title">' . get_the_title() . '</a>
                        </div>
                    </div>';
            }
            wp_reset_postdata();
        }
        echo '</div>';
    }

    protected function content_template()
    {
    }

    public function render_plain_content($instance = [])
    {
    }

}

Plugin::instance()->widgets_manager->register(new gesus_footer_post());
?>