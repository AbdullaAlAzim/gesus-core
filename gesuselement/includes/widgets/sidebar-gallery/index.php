<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class gesus_sidebar_gallery extends Widget_Base {

    public function get_name() {
        return 'sidebar-gallery';
    }

    public function get_title() {
        return __( 'Sidebar Gallery', 'gesus' );
    }
    public function get_categories() {
        return [ 'gesuselement-addons' ];
    }
    public function get_icon() {
        return 'eicon-person';
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
        $repeater->add_control(
            'member_photo', [
                'label' => __( 'Photo', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'member_list',
            [
                'label' => __( 'List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_photo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'member_photo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'member_photo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'member_photo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'member_photo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],
                    [
                        'member_photo' => [
                            'url' => \Elementor\Utils::get_placeholder_image_src(),
                        ],
                    ],

                ],
            ]
        );
   
        $this->end_controls_section();
        $this->start_controls_section(
            'section_style',
            [
                'label' => __( 'Style', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'title_color',
            [
                'label' => __( 'Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feed-box .feed-head .feed-bio h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .feed-box .feed-head .feed-bio h5',
            ]
        );
        $this->add_control(
            'inf_color',
            [
                'label' => __( 'Info Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .feed-box p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'inf_fonts',
                'label' => __( 'Info Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .feed-box p',
            ]
        );
        $this->add_control(
            'social_bga',
            [
                'label' => __( 'Testimonial BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'testi_sub_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .moda-title-heading .title::after',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        echo'<div class="gesus-wedgets-area">
         <div class="gesus-wedgets widget">
            <h2 class="wedgets-title">Instagram Post</h2>
            <div class="instagram-post">
                <div class="row">';
        if ($settings['member_list']) {
            foreach ($settings['member_list'] as $members) {
                echo '<div class="col-4">
                        <div class="instagram-thumb">
                            ' . get_that_image($members['member_photo']) . '
                            <a ' . get_that_link($members['link']) . ' class="link"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>';
            }
        }
        echo '</div>
            </div>
        </div>
    </div>
    ';

    }

    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register( new gesus_sidebar_gallery() );
?>