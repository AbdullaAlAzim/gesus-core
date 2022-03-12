<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class gesus_counter extends Widget_Base {

    public function get_name() {
        return 'gesus-counter';
    }
 
    public function get_title() {
        return __('Gesus Counter', 'gesus');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['gesuselement-addons'];
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Counter', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

         $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('// PROGRAMMS SCHEDULE','gesus'),
            ]
        );


         $this->add_control(
            'sub',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Free Family Event Countdown','gesus'),
            ]
        );
        $this->add_control(
            'cnter_date',
            [
                'label' => __('Counter Date', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('12/24/2022 23:59:59','gesus'),
            ]
        );

          $this->add_control(
            'counter_img', [
                'label' => __( 'Counter Background Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'counter_animi_one', [
                'label' => __( 'Counter Animation Shape One Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'counter_animi_two', [
                'label' => __( 'Counter Animation Shape Two Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

            $this->add_control(
            'counter_shape_three', [
                'label' => __( 'Counter Shape Three Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
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
                    '{{WRAPPER}} .gesus-countdown-wrapper .gesus-section-title h2, {{WRAPPER}} .gesus-section-title p' => 'color: {{VALUE}}',
                ],
            ]
        );

            $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'gesus' ),
                'types' => [ 'classic'],
                'selector' => '{{WRAPPER}} .countdown-items:hover, .countdown-items:focus',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-countdown-wrapper .gesus-section-title h2, {{WRAPPER}} .gesus-section-title p',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .countdown-items span, {{WRAPPER}} .countdown-items p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .countdown-items span, {{WRAPPER}} .countdown-items p',
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();
      ?>
        <!--  countdown start   -->
    <section class="gesus-countdown-section gesus-data-background gesus-section" data-background="<?php echo $settings['counter_img']['url']; ?>">
         <?php echo  get_that_image($settings['counter_animi_one'], 'shape-one'); ?>
         <?php echo  get_that_image($settings['counter_animi_two'], 'shape-two'); ?>
         <?php echo  get_that_image($settings['counter_shape_three'], 'shape-three'); ?>
        <div class="container">
           <div class="gesus-countdown-wrapper">
               <div class="gesus-section-title text-center">
                   <p class="orange-color"><?php echo ($settings['title']);?></p>
                   <h2><?php echo ($settings['sub']);?></h2>
               </div>
               <div class="row" id="coming-soon" data-date="<?php echo $settings['cnter_date'];?>">
                   <div class="col-md-3 col-6">
                        <div class="countdown-items">
                            <span class="days"><?php esc_html_e('00','gesus'); ?></span>
                            <p class="time-text"><?php esc_html_e('Days','gesus'); ?></p>
                        </div>
                   </div>
                   <div class="col-md-3 col-6">
                        <div class="countdown-items">
                            <span class="hours"><?php esc_html_e('00','gesus'); ?></span>
                            <p class="time-text"><?php esc_html_e('Hours','gesus'); ?></p>
                        </div>
                   </div>
                   <div class="col-md-3 col-6">
                        <div class="countdown-items">
                            <span class="minutes"><?php esc_html_e('00','gesus'); ?></span>
                            <p class="time-text"><?php esc_html_e('Minutes','gesus'); ?></p>
                        </div>
                   </div>
                   <div class="col-md-3 col-6">
                        <div class="countdown-items">
                            <span class="seconds"><?php esc_html_e('00','gesus'); ?></span>
                            <p class="time-text"><?php esc_html_e('Seconds','gesus'); ?></p>
                        </div>
                   </div>
               </div>             
           </div>
        </div>
    </section>
    <!--  countdown end   -->


               <?php 
    }


}
Plugin::instance()->widgets_manager->register( new gesus_counter() );