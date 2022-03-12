<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_upcoming_program extends Widget_Base
{
    public function get_name()
    {
        return 'upcoming-program';
    }

    public function get_title()
    {
        return __('Upcoming Program', 'gesus');
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
                'label' => __('Upcoming Programs', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Program Title', 'gesus'),
            ]
        );


        $this->add_control(
            'sub_title',
            [
                'label' => __('SubTitle', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Program SubTitle', 'gesus'),
            ]
        );


    $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'upcoming_title',
            [
                'label' => __( 'Program Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'The Happiness Program', 'gesus' ),
            ]
        );

          $repeater->add_control(
            'upcoming_duraa',
            [
                'label' => __( 'Program Durations', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( '10.00 am - 11.00 am', 'gesus' ),
            ]
        );

        $repeater->add_control(
            'event_details',
            [
                'label' => __( 'Program Details', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'The practical knowledge of breathing techniques gives you balance and wisdom that will transform your life by unlocking the true potential of your mind and soul by bringing', 'gesus' ),
            ]
        );

        $repeater->add_control(
            'event_loca',
            [
                'label' => __( 'Program Location', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Lowa city , lowa 4335, south Buidling Church', 'gesus' ),
            ]
        );
    
        $repeater->add_control(
            'event_pho', [
                'label' => __( 'Program Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
       
        $this->add_control(
            'member_list',
            [
                'label' => __( 'Program List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,

                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'upcoming_title' => __( 'Sermon', 'gesus' ),
                    ],
                    [
                        'upcoming_title' => __( 'Event', 'gesus' ),
                    ],
                    [
                        'upcoming_title' => __( 'Marrige', 'gesus' ),
                    ],

                ],
                'title_field' => '{{{ upcoming_title }}}',
            ]
        );
       
        $this->end_controls_section();

          $this->start_controls_section(
            'content_sectioni',
            [
                'label' => __('Image And Animation Shape', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

          $this->add_control(
            'photo_one', [
                'label' => __( 'Background Animation', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'photo_two', [
                'label' => __( 'Background Animation', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'photo_tree', [
                'label' => __( 'Background Animation', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'photo_for', [
                'label' => __( 'Background Animation', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

           $this->add_control(
            'photo_or', [
                'label' => __( 'Background Animation', 'gesus' ),
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
                    '{{WRAPPER}} .gesus-section-title p.orange-color, {{WRAPPER}} .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-section-title p',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'gesus' ),      
                'type' => \Elementor\Controls_Manager::COLOR,     
                'selectors' => [
                    '{{WRAPPER}} .timeline-content h3, {{WRAPPER}} .timeline-content p, {{WRAPPER}} .timeline-content span, {{WRAPPER}} .timeline-content .author-date a, {{WRAPPER}} .timeline-content span i' => 'color: {{VALUE}} !important',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ), 
                'selector' => '{{WRAPPER}} .timeline-content p ,{{WRAPPER}} .timeline-content h3, {{WRAPPER}} .timeline-content span, .timeline-content .author-date a, {{WRAPPER}}',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

    $settings = $this->get_settings();
?>
    <!--   Upcoming Programms start   -->
    <?php
    echo'<section class="upcoming-programm-section gesus-section">
        
          '.get_that_image($settings['photo_one'], 'left-shape').'
          '.get_that_image($settings['photo_two'], 'shape-one').'
        '.get_that_image($settings['photo_tree'], 'shape-two').'
        '.get_that_image($settings['photo_for'], 'shape-three').'
          '.get_that_image($settings['photo_or'], 'shape-four').'
        <div class="container">
            <div class="gesus-section-title text-center">
                <p class="orange-color">// ' . $settings['title'] . '</p>
                <h2>' . $settings['sub_title'] . '</h2>
            </div>
            <!-- The Timeline -->

            <ul class="timeline">';

if ($settings['member_list']) {
    $i=1;
            foreach ($settings['member_list'] as $key =>$members) { 
                
                      echo'<li>
                        <div class="row align-items-center">
                        <div class="col-lg-6">
                            <div class="timeline-thumb">
                                ' . get_that_image($members['event_pho']) . '
                            </div>
                        </div>';if($key % 2 != 1){echo 
                       ' <div class="col-lg-6">';}else{echo 
                       ' <div class="col-lg-6 order-lg-first">';}
                            echo 
                       '<div class="timeline-content">
                                <div class="author-date">
                                    <a href=""><i class="fal fa-clock"></i> ' . $members['upcoming_duraa'] . '</a>
                                </div>
                                <h3 class="kkk">' . $members['upcoming_title'] . '</h3>
                                <p class="ppp">' . $members['event_details'] . '</p>
                                <span class="oop"><i class="fas fa-map-marker-alt"></i> ' . $members['event_loca'] . '</span>
                            </div>
                        </div>
                    </div>
                    </li>';               
                 }
                    }
               echo'</ul>
        </div>
    </section>';
      
    }

}
Plugin::instance()->widgets_manager->register(new gesus_upcoming_program());
