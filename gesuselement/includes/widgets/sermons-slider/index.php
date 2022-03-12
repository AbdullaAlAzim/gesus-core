<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_sermons_slider extends Widget_Base
{

    public function get_name()
    {
        return 'sermons-slider';
    }

    public function get_title()
    {
        return __('Sermons Slider', 'gesus');
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
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Our Sermons', 'gesus' ),
            ]
        );
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Church Urges Govt
                 Address Poverty', 'gesus' ),
            ]
        );

         $this->add_control(
            'spc',
            [
                'label' => __( 'Speacial Charecter', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '.', 'gesus' ),
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
                'options' => ae_drop_cat('sermons_category'),
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
                'options' => ae_drop_posts('sermons'),
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
  

    $this->add_control(
            'sl_so',
            [
                'label' => esc_html__( 'Slider Social Icons', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

   $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __( 'Name', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Social Iocns', 'gesus' ),
            ]
        );

    $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __('Name', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Social Icons', 'gesus'),
            ]
        );
      $repeater->add_control(
            'url1',
            [
                'label' => __('Link 1', 'gesus'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'icon1',
            [
                'label' => __( 'Icon', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook',
                    'library' => 'brand',
                ],
            ]
        );



   
        $this->add_control(
            'member_list',
            [
                'label' => __('Social Icons', 'gesus'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __('Facebook', 'gesus'),
                    ],
                    [
                        'member_name' => __('Twitter', 'gesus'),
                    ],
                    [
                        'member_name' => __('Instagram', 'gesus'),
                    ],
                
                ],
                'title_field' => '{{{ member_name }}}',
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
                    '{{WRAPPER}} .blog-box .blog-meta ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihiaai',
                'label' => __('Meta Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-meta ul li',
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc h5',
            ]
        );
        $this->add_control(
            'post_des_color',
            [
                'label' => __('Excerpt Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihexc',
                'label' => __('Excerpt Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc p',
            ]
        );
        $this->add_control(
            'post_btn_color',
            [
                'label' => __('Button Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc .btn-2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihbtn',
                'label' => __('Button Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc .btn-2',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testi_sub_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-title-heading .title::after',
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
                'post_type' => 'sermons',
                'posts_per_page' => $per_page,
                'tax_query' => array(
                    array(
                        'taxonomy' => 'sermons_category',
                        'field' => 'term_id',
                        'terms' => $cat,
                    ),
                ),
            );
        }

        if ($settings['query_type'] == 'individual') {
            $query_args = array(
                'post_type' => 'sermons',
                'posts_per_page' => $per_page,
                'post__in' => $id,
                'orderby' => 'post__in'
            );
        }

        $wp_query = new \WP_Query($query_args);   

            $tax_args = array(
            'taxonomy' => 'sermons_category',
            'number' => '1',
            
        );
        $categories = get_terms($tax_args);?>
    <!--  Our Sermons start   -->
    <section class="gesus-our-sermons-section gesus-section">
        <div class="container">
            <div class="gesus-sermons-heading">
                <div class="gesus-section-title">
                    <p><?php echo $settings['title']; ?></p>
                    <h2><?php echo $settings['info']; ?><span><?php echo $settings['spc']; ?></span> </h2>
                </div>
                <div class="swiper-nav">
                    <div class="swiper-arrow" id="sermons-prev"><i class="fal fa-chevron-left"></i></div>
                    <div class="swiper-arrow" id="sermons-next"><i class="fal fa-chevron-right"></i></div>
                </div>
            </div>
        </div>
        <div class="gesus-our-sermons-wrapper swiper-container">
            <div class="swiper-wrapper">
                 <?php 
                    if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();?>
                <div class="swiper-slide">
                    <div class="sermons-items">
                      <?php the_post_thumbnail('plus-point-543-478'); ?>
                        <div class="gesus-content">
                            <ul class="gesus-social-link">
                                 <?php  foreach ($settings['member_list'] as $member): ?>
                               <li><a <?php echo get_that_link($member['url1']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon1']); ?></a></li>
                                  <?php endforeach; ?>
                           
                            </ul>
                            <div class="description">
                               <div class="left">
                                    <p><?php echo aa_category(); ?></p>
                                    <h4 class="title"><?php the_title(); ?></h4>
                               </div>
                               <div class="right">
                               <a href="<?php the_permalink(); ?>" class="gesus-ctg-btn bg-red"><i class="far fa-long-arrow-right"></i></a>
                               </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php 
               endwhile;endif; 
                 ?>
            </div>
        </div>
    </section>
    <!--  Our Sermons end   -->
   <?php 
      
    }
}
Plugin::instance()->widgets_manager->register(new gesus_sermons_slider());
?>