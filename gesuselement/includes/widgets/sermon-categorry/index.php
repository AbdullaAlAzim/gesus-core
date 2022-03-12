<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class sermon_cat_sec extends Widget_Base
{
    public function get_name()
    {
        return 'Sermons-cat';
    }

    public function get_title()
    {
        return __('Sermons Category', 'gesus');
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
                'label' => __('Sermons Category', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cat',
            [
                'label' => __('Category', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('sermons_category'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'show_cat',
            [
                'label' => esc_html__('Show Category', 'gesus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'gesus'),
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __('Style One', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-categories-items' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-categories-items',
            ]
        );
      

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'bg',
                'label' => __( 'Background', 'gesus' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .gesus-categories-items',
            ]
        );

       

        $this->end_controls_section();




         $this->start_controls_section(
            'content_styr',
            [
                'label' => __('Style Two', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'bgg',
                'label' => __( 'Background', 'gesus' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .gesus-categories-items::before',
            ]
        );

        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $tax_args = array(
            'taxonomy' => 'sermons_category',
            'number' => $settings['show_cat'],
            'include' => $settings['cat'],
        );
        $categories = get_terms($tax_args);

    
    ?>

    <!-- categories section start -->
    <section class="gesus-categories-section gesus-section">
        <div class="container">
            <div class="row">
        <?php
            foreach($categories as $category) :

               $metadata = get_term_meta($category->term_id, 'azim_taxonomy_options', true); ?>
            
                <div class="col-lg-3 col-sm-6">
                    <a href="<?php echo get_term_link( $category->term_id, 'sermons_category');?>" class="gesus-categories-items">
                        <span>
                        <?php if(isset($metadata['upload'])): ?>
                           <img src="<?php  echo esc_url($metadata['upload']); ?>">
                        <?php endif; ?>

                        </span>
                        <?php echo esc_html($category->name ); ?>
                    </a>
                </div>
                 <?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- categories section end -->
<?php 
      
    }

}
Plugin::instance()->widgets_manager->register(new sermon_cat_sec());
?>