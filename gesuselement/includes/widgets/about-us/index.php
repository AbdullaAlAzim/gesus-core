<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class gesus_about_us extends Widget_Base {

    public function get_name() {
        return 'gesus-about-us';
    }
 
    public function get_title() {
        return __('About us', 'gesus');
    }

    public function get_icon() {
        return 'eicon-form-horizontal';
    }

    public function get_categories() {
        return ['gesuselement-addons'];
    }

    public function get_keywords() 
    {
        return [ 'about'];
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
                        'title' => __( 'Layout 1', 'gesus' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                    'layout2' => [
                        'title' => __( 'Layout 2', 'gesus' ),
                        'icon' => 'eicon-form-horizontal',
                    ],
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );
         $this->add_control(
            'title_sec',
            [
                'label' => __( 'Section Heading', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                     'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => __( 'ETHICAL & MORAL BELIEFS THAT GUIDES', 'gesus' ),
            ]
        );

     
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                    'condition' => [
                    'layout' => 'layout1',
                ],
             
                'default' => __( 'ETHICAL & MORAL BELIEFS THAT GUIDES', 'gesus' ),
            ]
        );

    
        $this->add_control(
            'info',
            [
                'label' => __( 'Info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'condition' => [
                    'layout' => 'layout1',
                ],
             
              
                'default' => __( 'Nisi utm aliquip sed tempor duis aute lorem ipsum dolor sitye amet consectetur autys adipisicing elit sed dolor eiusmod tempor utm incididunts lorem ipsum sed labore et dolore magna aliqua.', 'gesus' ),
            ]
        );

      


         $this->add_control(
            'button',
            [
                'label' => __('Button', 'gesus'),
                'type' => Controls_Manager::TEXT,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => __('About More', 'gesus'),
            ]
        );
        $this->add_control(
            'link', [
                'label' => __('Button Link', 'gesus'),
                'type' => Controls_Manager::URL,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $this->add_control(
            'video_link', [
                'label' => __('Video Link', 'gesus'),
                'type' => Controls_Manager::URL,
                'condition' => [
                    'layout' => 'layout2',
                ],
                'show_external' => true,
                'default' => [
                    'url' => 'https://youtu.be/SS3zZ7Ma83M',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
         $repeater = new \Elementor\Repeater();
     
         
        $repeater->add_control(
            'aboutt_title',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __('Nostrud temp exercitation et duis laboriss', 'gesus'),
            ]
        );
    
        $this->add_control(
            'hero_list',
            [
                'label' => __( 'About List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                    'condition' => [
                    'layout' => 'layout1',
                ],
                'fields' => $repeater->get_controls(),
             
                'default' => [
                    [
                        'aboutt_title' => __( 'Nostrud temp exercitation et duis laboris', 'gesus' ),
                    ],
                    [
                        'aboutt_title' => __( 'Labore utm aliquip sed duis ipsum aute', 'gesus' ),
                    ],
                    [
                        'aboutt_title' => __( 'Eiusmod tempor utm incididunts dolore magna', 'gesus' ),
                    ],

                ],
                'title_field' => '{{{ aboutt_title }}}',
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Image One', 'gesus' ),
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
            'image1',
            [
                'label' => __( 'image two', 'gesus' ),
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
            'image2',
            [
                'label' => __( 'About Spine', 'gesus' ),
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
            'image22',
            [
                'label' => __( 'About Dot Shape', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                     'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $this->add_control(
            'image223',
            [
                'label' => __( 'About BG Shape', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                     'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'image007',
            [
                'label' => __( 'About Thumb', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                     'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'image008',
            [
                'label' => __( 'Video Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                     'condition' => [
                    'layout' => 'layout2',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'image3',
            [
                'label' => __( 'About Shape', 'gesus' ),
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
            'image4',
            [
                'label' => __( 'Animate Image one', 'gesus' ),
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
            'image5',
            [
                'label' => __( 'Animate Image two', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                     'condition' => [
                    'layout' => 'layout1',
                ],
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
                    '{{WRAPPER}} .gesus-section-title p.orange-color, {{WRAPPER}} .gesus-section-title p' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'post_sub_title_color',
            [
                'label' => __( 'Sub Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-btn.black-btn' => 'color: {{VALUE}} !important',
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
                    '{{WRAPPER}} .about-content, {{WRAPPER}} .about-content li, {{WRAPPER}} .gesus-about-content-wrapper .about-content ul li i, {{WRAPPER}} .gesus-about-church-content .about-content ul li span' => 'color: {{VALUE}} !important',
                ],
            ]
        );

           $this->add_control(
            'hhg_c',
            [
                'label' => __( 'Button Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn.black-btn' => 'background: {{VALUE}} !important',
                ],
            ]
        );

               $this->add_control(
            'hhgg_c',
            [
                'label' => __( 'Button hover Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn.black-btn:before' => 'background: {{VALUE}} !important',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'bg',
                'label' => __( 'Hover Color', 'gesus' ),
                'types' => [ 'classic', 'gradient'],
                'selector' => '{{WRAPPER}} .gesus-about-church-content .about-content ul li:hover span',
            ]
        );

      
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .about-content, {{WRAPPER}} .about-content li, {{WRAPPER}} .about-content .gesus-btn'
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }


}
Plugin::instance()->widgets_manager->register( new gesus_about_us() );
?>