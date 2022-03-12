<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_donation_process extends Widget_Base
{
    public function get_name()
    {
        return 'gesus-donation-process';
    }

    public function get_title()
    {
        return __('Gesus Donation Process', 'gesus');
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
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('// LATEST CAUSE'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Contribute For These With Your Gentle Heart'),
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
            'section_settings',
            [
                'label' => __( 'General', 'gesus' ),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __( 'Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title p.orange-color' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title p.orange-color',
            ]
        );
        $this->add_control(
            'st',
            [
                'label' => __( 'Sub Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttsihaa',
                'label' => __( 'Sub Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title h2',
            ]
        );
        $this->add_control(
            'dst',
            [
                'label' => __( 'Block Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .donation-blog-items .card-body .card-title .donation-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tbbtsihaa',
                'label' => __( 'Block Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .donation-blog-items .card-body .card-title .donation-title',
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
?>


        <!--  Donation blog section start   -->
        <section class="donation-blog-section gesus-section">
            <div class="container">
                <div class="gesus-section-title">
                    <p class="orange-color"><?php echo $settings['title']?></p>
                    <h2 class="m-0"><?php echo $settings['sub_title']?></h2>
                </div>
                <div class="donation-blog-wrapper">
                    <div class="row">
                        <?php
                        if ($wp_query->have_posts()) :
                            while ($wp_query->have_posts()) :
                                $wp_query->the_post();
                                $id = get_the_ID();
                                // Output the content
                                $content_option = get_post_meta($id, '_give_content_option', true);
                                if ($content_option != 'none') {
                                    $content = get_post_meta($id, '_give_form_content', true);
                                }
                                $checkout_label = get_post_meta($id, '_give_checkout_label', true);
                                $goal_progress = get_post_meta($id, '_give_form_goal_progress', true);
                                $goal_set = get_post_meta($id, '_give_set_goal', true);
                                $goal = substr($goal_set, 0, strpos($goal_set, "."));
                                $goal_earning = get_post_meta($id, '_give_form_earnings', true);
                                $earning = substr($goal_earning, 0, strpos($goal_earning, "."));
                                $status = get_post_meta($id, '_give_form_status', true);
                                $meta = get_post_meta($id);
                                //var_dump($meta);

                                ?>
                                <div <?php post_class('col-lg-4 home2-donation-list');?>>
                            <div class="card donation-blog-items">
                                <a href="<?php the_permalink(); ?>" class="donation-thumb">
                                    <?php give_get_template_part('single-give-form/featured-image'); ?>
                                </a>
                                <div class="card-body">
                                    <div class="card-title">
                                        <a href="<?php the_permalink(); ?>" class="categores"><?php echo wp_kses_post($status); ?></a>
                                        <a href="<?php the_permalink(); ?>" class="donation-title"> <?php the_title(); ?></a>
                                    </div>
                                    <div class="donation-progressbar">
                                        <div id="bar<?php echo esc_attr($id);?>" data-donate-id="<?php echo esc_attr($id);?>" class="barfiller">
                                            <span class="fill" data-percentage="<?php echo wp_kses_post($goal_progress);?>"></span>
                                        </div>
                                    </div>
                                    <div class="price">
                                        <p><?php echo wp_kses_post(give_currency_symbol().$goal_earning);?></p>
                                        <p><?php echo wp_kses_post(give_currency_symbol().$goal);?></p>
                                    </div>
                                    <a href="<?php the_permalink(); ?>" class="bg-orange btn gesus-btn"><?php echo wp_kses_post($checkout_label); ?></a>
                                </div>
                            </div>
                        </div>
                        <?php

                        endwhile;

                    endif;
                    ?>
                    </div>
                    <?php if ($wp_query->max_num_pages){?>
                    <a href="<?php echo get_post_type_archive_link('give_forms')?>" class="btn gesus-btn view-all"><?php echo esc_html('View All');?></a>
                    <?php }?>
                </div>
            </div>
        </section>
        <!--  Donation blog section  end   -->
        <?php
      
    }

}

Plugin::instance()->widgets_manager->register(new gesus_donation_process());