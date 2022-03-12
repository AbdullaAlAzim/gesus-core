<?php

namespace Elementor;

if (!defined('ABSPATH')) 
    exit; // Exit if accessed directly


class gesus_video extends Widget_Base {

    public function get_name() {
        return 'gesus-video';
    }
 
    public function get_title() {
        return __('Gesus-Video', 'gesus');
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
                        'icon' => 'eicon-post-slider',
                    ],
               
                ],
                'default' => 'layout1',
                'toggle' => true,
            ]
        );

           $this->add_control(
            'vid_link', [
                'label' => __('Video Link One', 'gesus'),
                'type' => Controls_Manager::URL,
                 'condition' => [
                    'layout' => 'layout1',
                ],
              
                'show_external' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=XqSXQkj_FnI',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'vid_linkkk', [
                'label' => __('Video Link Two', 'gesus'),
                'type' => Controls_Manager::URL,
                 'condition' => [
                    'layout' => 'layout2',
                ],
                'show_external' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=XqSXQkj_FnI',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Background image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                   'condition' => [
                    'layout' => 'layout1'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'bg_image',
            [
                'label' => __( 'Video image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                   'condition' => [
                    'layout' => 'layout1'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

       $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'condition' => [
                    'layout' => 'layout1'
                ],
                'default' => __( 'Our Live Broadcast', 'gesus' ),
            ]
        ); 

         $this->add_control(
            'title_two',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'condition' => [
                    'layout' => 'layout2'
                ],
                'default' => __( '“Pray! And listen to God! You can do find somebody to do it with', 'gesus' ),
            ]
        );

          $this->add_control(
            'button_t',
            [
                'label' => __( 'Button Text', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                   'condition' => [
                    'layout' => 'layout2'
                ],
                'default' => __( 'Donate Online', 'gesus' ),
            ]
        );


        $this->add_control(
            'button_lnk', [
                'label' => __('Button Link', 'gesus'),
                'type' => Controls_Manager::URL,
                 'condition' => [
                    'layout' => 'layout2',
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
            'button_tt',
            [
                'label' => __( 'Button Text', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                   'condition' => [
                    'layout' => 'layout2'
                ],
                'default' => __( 'About Us', 'gesus' ),
            ]
        );

            $this->add_control(
            'button_tlnk', [
                'label' => __('Button Link', 'gesus'),
                'type' => Controls_Manager::URL,
                 'condition' => [
                    'layout' => 'layout2',
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
            'sub_title',
            [
                'label' => __( 'Sub Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'condition' => [
                    'layout' => 'layout1'
                ],
                'default' => __( 'WATCH VIDEO', 'gesus' ),
            ]
        ); 

         $this->add_control(
            'vid_details',
            [
                'label' => __( 'Video Details', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                   'condition' => [
                    'layout' => 'layout1'
                ],
                'default' => __( 'consectetur adipisicing elit, sed do eiusmod tempor incididunt laboret dolore magna aliqua. Ut enim minim veniam quis nostrud ullamco laboris nisi ut aliquip ex ea commodo', 'gesus' ),
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
                    '{{WRAPPER}} .gesus-video-wrp h3, {{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );


        $this->add_control(
            'btn_color',
            [
                'label' => __( 'Button One Primary Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
              
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn' => 'background: {{VALUE}}',
                ],
            ]
        );



        $this->add_control(
            'btn_caolor',
            [
                'label' => __( 'Button One Secondary Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
              
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'btn_csolor',
            [
                'label' => __( 'Button Two Primary Color ', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
              
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn.white-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );





          $this->add_control(
            'bbtn_csolor',
            [
                'label' => __( 'Button Two Secondary Color ', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
              
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn.white-btn' => 'background: {{VALUE}}',
                ],
            ]
        );

      

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .gesus-video-wrp h3, {{WRAPPER}} .gesus-btn',
            ]
        );


        $this->add_control(
            'hh_c',
            [
                'label' => __( 'Content Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-broadcast-content p.vid-one' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-broadcast-content p.vid-one',
            ]
        );
        $this->end_controls_section();

    }
        
    protected function render(){

        $settings = $this->get_settings();
        include dirname(__FILE__). '/' . $settings['layout']. '.php';
    }


}
Plugin::instance()->widgets_manager->register( new gesus_video() );
?>