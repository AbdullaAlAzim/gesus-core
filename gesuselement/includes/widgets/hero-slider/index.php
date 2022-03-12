<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_hero_slider extends Widget_Base
{

    public function get_name()
    {
        return 'gesus-hero-slider';
    }

    public function get_title()
    {
        return __('Hero Slider', 'gesus');
    }

    public function get_categories()
    {
        return ['gesuselement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Jesus Culture is a community of worship leaders whose heart is to see generation impacted by encounters with presence. ', 'gesus'),
            ]
        );

          $repeater->add_control(
            'ba_slogun',
            [
                'label' => __('Bannner Slogun', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('HOPE IS ALIVE', 'gesus'),
                 'selectors' => [
                    '{{WRAPPER}} .gesus-banner-content  span' => 'color: {{VALUE}}',
                ],
            ]


        );

  
        $repeater->add_control(
            'titlee',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Prosfer with a good planning and assets.', 'gesus'),
            ]
        );
        $repeater->add_control(
            'button',
            [
                'label' => __('Button', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Learn more', 'gesus'),
            ]
        );
        $repeater->add_control(
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
       

        $repeater->add_control(
            'image_bg',
            [
                'label' => __( 'Background Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'hero_list',
            [
                'label' => __( 'Hero Slider', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
             
                'default' => [
                    [
                        'titlee' => __( 'Prosfer with a good planning and assets.', 'gesus' ),
                    ],
                    [
                        'titlee' => __( 'Prosfer with a good planning and assets.', 'gesus' ),
                    ],
                    [
                        'titlee' => __( 'Prosfer with a good planning and assets.', 'gesus' ),
                    ],

                ],
                'title_field' => '{{{ titlee }}}',
            ]
        );
        $this->end_controls_section();
      
        $this->start_controls_section(
            'section_style',
            [
                'label' => __('Style', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-banner-content h2' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'sub_title_color',
            [
                'label' => __('Sub Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-banner-content  p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-banner-content h2',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Content Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .accordion-box .accordion .acc-content p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __('Content Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-banner-content  p',
            ]
        );
    
        $this->end_controls_section();
    }

    protected function render()
    {
          $settings = $this->get_settings();

    ?>

<?php
      echo '
    <section class="gesus-banner-section">
        <div class="gesus-banner-wrapper swiper-container">
            <div class="swiper-wrapper">';
    if ($settings['hero_list']) {
        foreach ($settings['hero_list'] as $hero) {
            echo '<div class="swiper-slide banner-slide-wrapper gesus-data-background" data-background="'.$hero['image_bg']['url'].'">
                    <div class="container">
                        <div class="gesus-banner-content">
                            <span>'.$hero['ba_slogun'].'</span>
                            <h2>'.$hero['titlee'].'</h2>
                            <p>'.$hero['sub_title'].'</p>
                            <a '.get_that_link($hero['link']).' class="btn gesus-btn white-btn"><i class="fas fa-paper-plane"></i> '.$hero['button'].'</a>
                        </div>
                    </div>
                </div>';
        }
    }
    echo '</div>
            <div class="swiper-nav">
                <div class="swiper-arrow" id="banner-prev"><i class="fal fa-chevron-left"></i></div>
                <div class="swiper-arrow" id="banner-next"><i class="fal fa-chevron-right"></i></div>
            </div>
        </div>
    </section>';
   

    }
}
Plugin::instance()->widgets_manager->register(new gesus_hero_slider());
