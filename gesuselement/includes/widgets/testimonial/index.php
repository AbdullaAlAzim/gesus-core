<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class gesus_testimonial extends Widget_Base {

    public function get_name() {
        return 'gesus-testimonial';
    }

    public function get_title() {
        return __( 'Testimonial', 'gesus' );
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
          $this->add_control(
            'layout',
            [
                'label' => __( 'Layout', 'gesus' ),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'layout1' => [
                        'title' => __( 'One', 'gesus' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Two', 'gesus' ),
                        'icon' => 'eicon-post-slider',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
        $this->add_control(
            'titlez',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
              
                'default' => __('We Are Very Happy To Get Our Client’s Reviews.', 'gesus'),
            ]
        );
        $this->add_control(
            'sub_titlez',
            [
                'label' => __(' Sub Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
              
                'default' => __('Client Testimonial', 'gesus'),
            ]
        );

         $this->add_control(
            'aa_special',
            [
                'label' => __(' Section Special Charecter', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'condition' => [
                    'layout' => 'layout2'
                ],
              
                'default' => __('//', 'gesus'),
            ]
        );
        $this->add_control(
            'shape_one', [
                'label' => __( 'Round Shape one', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'shape_two', [
                'label' => __( 'Round Shape two', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $this->add_control(
            'shape_three', [
                'label' => __( 'Round Shape three', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'shape_four', [
                'label' => __( 'Round Shape Four', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'left_img', [
                'label' => __( 'Left Section blob Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

           $this->add_control(
            'left_shape_one', [
                'label' => __( 'Left blob shape One', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

            $this->add_control(
            'left_shape_two', [
                'label' => __( 'Left blob shape Two', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

             $this->add_control(
            'left_shape_three', [
                'label' => __( 'Left blob shape Three', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'group_img', [
                'label' => __( 'Group Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                    'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __( 'Name', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Al-Mahmud', 'gesus' ),
            ]
        );
        $repeater->add_control(
            'member_desi',
            [
                'label' => __( 'Designation', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Ceo & Founder', 'gesus' ),
            ]
        );
        $repeater->add_control(
            'member_info',
            [
                'label' => __( 'Comment', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea', 'gesus' ),
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
                'label' => __( 'Client List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,

                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __( 'Al-Mahmud', 'gesus' ),
                    ],
                    [
                        'member_name' => __( 'Al-Mahmud', 'gesus' ),
                    ],
                    [
                        'member_name' => __( 'Al-Mahmud', 'gesus' ),
                    ],
                    [
                        'member_name' => __( 'Al-Mahmud', 'gesus' ),
                    ],

                ],
                'title_field' => '{{{ member_name }}}',
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
                    '{{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .testimonial-two .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __( 'Title Typography', 'gesus' ),   
                'selector' => '{{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-section-title p',
            ]
        );
        $this->add_control(
            'inf_color',
            [
                'label' => __( 'Info Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,        
                'selectors' => [  
                    '{{WRAPPER}} .gesus-testimonial-content p, {{WRAPPER}} .gesus-testimonial-content p i, {{WRAPPER}} .gesus-testimonial-content .author .title, {{WRAPPER}} .gesus-testimonial-content .author small' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),     
            [
                'name' => 'inf_fonts',
                'label' => __( 'Info Typography', 'gesus' ),      
                'selector' => '{{WRAPPER}} .gesus-testimonial-content p, {{WRAPPER}} .gesus-testimonial-content .author .title, {{WRAPPER}} .gesus-testimonial-content .author small',
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
                'selector' => '{{WRAPPER}} .gesus-title-heading .title::after',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';

    }

    protected function content_template() {}

    public function render_plain_content( $instance = [] ) {}

}
Plugin::instance()->widgets_manager->register( new gesus_testimonial() );
?>