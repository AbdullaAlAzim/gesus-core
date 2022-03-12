<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class gesus_brand extends Widget_Base {

    public function get_name() {
        return 'gesus-brand';
    }
 
    public function get_title() {
        return __('Gesus Brand', 'gesus');
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
                'label' => __( 'Content', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __( 'Brand Name', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'gesus', 'gesus' ),
            ]
        );
        $repeater->add_control(
            'image',
            [
                'label' => __( 'Choose Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $repeater->add_control(
            'link', [
                'label' => __('Link', 'gesus'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'brand_list',
            [
                'label' => __( 'Brand List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'gesus', 'gesus' ),
                    ],
                    [
                        'title' => __( 'gesus', 'gesus' ),
                    ],
                    [
                        'title' => __( 'gesus', 'gesus' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
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
                    '{{WRAPPER}} .fun-fact .fun-desc .timer' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .fun-fact .fun-desc .timer',
            ]
        );
        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .fun-fact .fun-desc .medium' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .fun-fact .fun-desc .medium',
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();
      ?>
    <?php echo '<section class="gesus-brand-section gesus-section">
        <div class="container">
            <div class="gesus-brand-wrapper swiper-container">
                <div class="swiper-wrapper">';

                      if ($settings['brand_list']) {
            foreach ($settings['brand_list'] as $brand) {
                echo '
                    <div class="swiper-slide">
                          '.get_that_image($brand['image']).'
                    </div>';

                     }
                  }

              echo '</div>
            </div>
        </div>
    </section>';
   
    }
}
Plugin::instance()->widgets_manager->register( new gesus_brand() );