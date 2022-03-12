<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class sidebar_tags extends Widget_Base
{
    public function get_name()
    {
        return 'sidebar-tags';
    }

    public function get_title()
    {
        return __('Sidebar Tags', 'gesus');
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
                'label' => __('Sidebar Tags', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cat',
            [
                'label' => __('Tags', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('post_tag'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Show Tags', 'gesus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'gesus'),
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
                    '{{WRAPPER}} .tags-link' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .tags-link',
            ]
        );
        $this->add_control(
            'bg_color',
            [
                'label' => __('BG Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags-link' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'bgh_color',
            [
                'label' => __('BG Hover Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .tags-link:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $tax_args = array(
            'taxonomy' => 'post_tag',
            'number' => $settings['show_cat'],
            'include' => $settings['cat'],
        );
        $categories = get_terms($tax_args);

        ?>
       

<div class="gesus-wedgets-area">
<div class="gesus-wedgets widget mb-0">
    <h2 class="wedgets-title"><?php esc_html_e('Populer Tags','gesus'); ?></h2>
    <ul class="gesus-popular-tags">
         <?php
            foreach($categories as $category) :
            ?>
        <li><a href="<?php echo get_term_link($category->slug, 'post_tag') ?>" class="gesus-btn"><?php echo esc_html($category->name ); ?></a></li> <?php endforeach; ?>
    
    </ul>
</div>
</div>

  <?php 
      
    }

}

Plugin::instance()->widgets_manager->register(new sidebar_tags());
?>