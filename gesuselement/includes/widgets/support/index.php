<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_support extends Widget_Base
{
    public function get_name()
    {
        return 'gesus-support';
    }

    public function get_title()
    {
        return __('Gesus Support', 'gesus');
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
                'label' => __('Banner', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Still You Need Our Support ?', 'gesus'),
            ]
        );

          $this->add_control(
            'sub_info',
            [
                'label' => __('Banner Summary', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Don’t wait make a smart & logical quote here. Its pretty easy.', 'gesus'),
            ]
        );

        $this->add_control(
            'button',
            [
                'label' => __('Button', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Become Volunteer', 'gesus'),
            ]
        );

         $this->add_control(
            'link_pop', [
                'label' => __('Video PopUp Link', 'gesus'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => 'https://youtu.be/SS3zZ7Ma83M',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'link', [
                'label' => __('Button Link', 'gesus'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
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
                    '{{WRAPPER}} .gesus-support-wrapper .gesus-support-left h2, {{WRAPPER}} .gesus-support-wrapper .gesus-support-left p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-support-wrapper .gesus-support-left h2, {{WRAPPER}} .gesus-support-wrapper .gesus-support-left p',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Icon Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-support-wrapper .gesus-support-right .gesus-play-btn' => 'color: {{VALUE}} !important',
                ],
            ]
        );
     

            $this->add_control(
            'more_options',
            [
                'label' => __( 'Button', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'btntyp',
                'label' => __( 'Button Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-support-wrapper .gesus-support-right .btn',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-support-wrapper .gesus-support-right .btn',
            ]
        );

            $this->add_control(
            'mo_options',
            [
                'label' => __( 'Section bg', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'gg',
                'label' => __( 'Background', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-support-wrapper',
            ]
        );


            $this->add_control(
            'io_options',
            [
                'label' => __( 'Video Icon BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'ivo',
                'label' => __( 'Background', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-play-btn.white-btn:after',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

    $settings = $this->get_settings();
?>

 <!--  Support start   -->
    <section class="gesus-support-section">
        <div class="container">
            <div class="gesus-support-wrapper">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="gesus-support-left">
                            <h2><?php echo $settings['title']; ?></h2>
                            <p><?php echo $settings['sub_info']; ?></p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="gesus-support-right">
                            <a href="<?php echo $settings['link_pop']['url']; ?>" class="gesus-play-btn white-btn" data-lity><i class="fas fa-play"></i></a>
                            <a <?php echo get_that_link($settings['link']); ?> class="btn"><?php echo $settings['button']; ?></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Support end   -->
       
<?php 
      
    }

}

Plugin::instance()->widgets_manager->register(new gesus_support());
