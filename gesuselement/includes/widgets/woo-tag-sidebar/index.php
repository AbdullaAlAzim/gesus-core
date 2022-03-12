<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class woo_sidebar_tags extends Widget_Base
{
    public function get_name()
    {
        return 'woosidebartags';
    }

    public function get_title()
    {
        return __('Woo Sidebar Tags', 'gesus');
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
                'label' => __('Woo Sidebar Tags', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'tag',
            [
                'label' => __('Tag', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('product_tag'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control(
            'show_tag',
            [
                'label' => esc_html__('Show Tag', 'gesus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('5', 'gesus'),
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $tax_args = array(
            'taxonomy' => 'product_tag',
            'number' => $settings['show_tag'],
            'include' => $settings['tag'],
        );
        $categories = get_terms($tax_args);

        ?>
	  <div class="widgets gesus-related-tags">
	        <h3 class="gesus-widgets-title"><?php echo esc_html('Releated Tags');?></h3>
	        <ul>
	        	<?php
	            foreach($categories as $category) :
	            ?>
	            <li><a href="<?php echo get_term_link($category->slug, 'product_tag') ?>"><?php echo esc_html($category->name ); ?></a></li><?php endforeach; ?>
	        </ul>
	    </div>
  <?php 
      
    }

}
Plugin::instance()->widgets_manager->register(new woo_sidebar_tags());
?>