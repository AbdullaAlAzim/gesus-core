<?php
namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_woo_wid extends Widget_Base
{

    public function get_name()
    {
        return 'gesustopproduct';
    }

    public function get_title()
    {
        return __('Top Rated Products', 'gesus');
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
                'label' => __('Top Rated Products', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Best Selling Products', 'gesus' ),
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
                'options' => ae_drop_cat('product_cat'),
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
                'options' => ae_drop_posts('product'),
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
                'default' => 1,
            ]
        );
        $this->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                'condition' => [
                    'layout' => 'layout3',
                ],
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
                'post_type' => 'product',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'product_cat',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ),
                ),
            );
        }

        if ($settings['query_type'] == 'individual') {
            $query_args = array(
                'post_type' => 'product',
                'posts_per_page' => $per_page,
                'post__in' => $id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_args);?>
        <div class="widgets rated-product">
            <h3 class="gesus-widgets-title"><?php echo esc_html('Top Rated Products');?></h3>
    <?php 
        if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();?>
            <div class="product-categories-items">
                <a href="<?php echo get_the_permalink(); ?>" class="thumb">
                <?php 
                  if (has_post_thumbnail()) {
                 the_post_thumbnail('plus-point-72-65');
                   }
                ?>
                </a>
                <div class="categories-content">
                    <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                  <?php  global $product;
                       $price = $product->get_price_html(); 
                    ?>
                     <?php echo woocommerce_template_loop_rating(); ?>
                    <p><?php echo $price; ?></p>
                </div>
            </div>
              <?php 
            endwhile;endif; 
            ?>
        </div>

        <?php

    }

}
Plugin::instance()->widgets_manager->register(new gesus_woo_wid());
?>