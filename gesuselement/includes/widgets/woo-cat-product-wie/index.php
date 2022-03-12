<?php
namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class woo_sidebar_cate extends Widget_Base
{
    public function get_name()
    {
        return 'woosidebarcat';
    }

    public function get_title()
    {
        return __('Woo Sidebar Category', 'gesus');
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
                'label' => __('Woo Sidebar Category', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'cat',
            [
                'label' => __('Category', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' => ae_drop_cat('product_cat'),
                'label_block' => true,
                'multiple' => true,
            ]
        );
        $this->add_control (
            'show_cat',
            [
                'label' => esc_html__('Show cat', 'gesus'),
                'type' => \Elementor\Controls_Manager::NUMBER,
                'default' => esc_html__('9', 'gesus'),
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

    $settings = $this->get_settings_for_display();
        $tax_args = array(
            'taxonomy' => 'product_cat',
            'number' => $settings['show_cat'],
            'include' => $settings['cat'],
        );
        $categories = get_terms($tax_args);

        ?>
  
<div class="gesus-product-categories-side">
 <div class="widgets catagoris">
      <h3 class="gesus-widgets-title"><?php esc_html_e('Product Catagoris','gesus'); ?></h3>
   <div class="gesus-wedgets widget">
     <ul class="categories">
         <?php
            foreach($categories as $category) :
            ?>
              <li><a href="<?php echo get_term_link($category->slug, 'product_cat') ?>"><?php echo esc_html($category->name ); ?><span><?php echo esc_html($category->count); ?></span></a></li><?php
            endforeach; wp_reset_query(); 
            ?>
        </ul>
    </div>
</div>
</div>
  <?php 
      
    }

}
Plugin::instance()->widgets_manager->register(new woo_sidebar_cate());
?>