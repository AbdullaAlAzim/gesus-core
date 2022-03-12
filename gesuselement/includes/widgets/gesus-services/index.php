<?php
namespace Elementor;
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class gesus_servicess extends Widget_Base {

   public function get_name() {
      return 'gesus-services';
   }

   public function get_title() {
      return __( 'Gesus Services', 'gesus' );
   }
    public function get_categories() {
		return [ 'gesuselement-addons' ];
	}
   public function get_icon() { 
        return 'eicon-posts-group';
   }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Services', 'gesus' ),
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
            'title',
            [
                'label' => __( 'Section Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __('CORE SERVICES', 'gesus'),
            ]
        );

           $this->add_control(
            'sub_title',
            [
                'label' => __( 'Section Sub Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Acceptional Services', 'gesus'),

            ]
        );

            $this->add_control(
            'sub_details',
            [
                'label' => __( 'Section Details', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                 'default' => __('consectetur adipisicing elit, sed do eiusmod tem dolore magna aliqua. Ut enim minim veniam quis ullamco laboris nisi ut aliquip ', 'gesus'),
            ]
        );


           $this->add_control(
            'sub_charecter',
            [
                'label' => __( 'Section Special Charecter', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __('.', 'gesus'),
                'condition' => [
                    'layout' => 'layout1'
                ],
            ]
        );

            $this->add_control(
            'sub_char',
            [
                'label' => __( 'Section Special Charecter', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __('//', 'gesus'),

                'condition' => [
                    'layout' => 'layout2'
                ],
            ]
        );

        $this->add_control(
            'image1',
            [
                'label' => __( 'Section Background', 'gesus' ),
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
            'image2',
            [
                'label' => __( 'Background image Right', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                  'condition' => [
                    'layout' => 'layout2'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'image3',
            [
                'label' => __( 'Background image Left', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                  'condition' => [
                    'layout' => 'layout2'
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


         $this->add_control(
            'button',
            [
                'label' => __('Button', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Learn more', 'gesus'),
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


        $this->add_control(
            'button_ser_two',
            [
                'label' => __('Button', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Learn more', 'gesus'),
            ]
        );
        $this->add_control(
            'link_ser_two', [
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

           $this->add_control(
            'item_bg_img',
            [
                'label' => __( 'Item Bg', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                   'condition' => [
                    'layout' => 'layout1',
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
                
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __( 'Service Name', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'gesus', 'gesus' ),
            ]
        );
        $repeater->add_control(
            'info',
            [
                'label' => __( 'Service info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or web designs.....', 'gesus' ),
            ]
        );

        $repeater->add_control(
            'service_link',
            [
                'label' => __( 'Service Link', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
               
            ]
        );
   
        $repeater->add_control(
            'image',
            [
                'label' => __( 'Item Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );


        $this->add_control(
            'services_list',
            [
                'label' => __( 'Service List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Daily Prayers', 'gesus' ),
                    ],
                     [
                        'title' => __( 'Teaching Program', 'gesus' ),
                    ],
                    [
                        'title' => __( '24 X 7 SUPPORTS', 'gesus' ),
                    ],
                    [
                        'title' => __( 'BEST QUALITY', 'gesus' ),
                    ],
                    [
                        'title' => __( 'GIFT VOUCHER', 'gesus' ),
                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __( 'Style', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __( 'Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-section-title p.orange-color' => 'color: {{VALUE}}',
                ],
            ]
        );

          $this->add_control(
            'postssa_title_color',
            [
                'label' => __( 'Sub Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2, {{WRAPPER}} .core-services-wrapper .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );

           $this->add_control(
            'postg_in_color',
            [
                'label' => __( 'Section Details Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .services-title p' => 'color: {{VALUE}}',
                ],
            ]
        );

           $this->add_control(
            'postssa_title_colorb',
            [
                'label' => __( 'Button Color Primary', 'gesus' ),   
                'type' => \Elementor\Controls_Manager::COLOR,     
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn.gesus-black-btn, {{WRAPPER}} .featured-items .gesus-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

            $this->add_control(
            'postssa_sr_colorb',    
            [
                'label' => __( 'Service Title Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,   
                'selectors' => [
                    '{{WRAPPER}} .gesus-services-categories h3, {{WRAPPER}} .featured-items h4, {{WRAPPER}} .featured-items p' => 'color: {{VALUE}}',
                ],
            ]
        );
 
              $this->add_control(
            'postssa_card_co',
            [
                'label' => __( 'Service Card Color', 'gesus' ),   
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-services-categories::before, {{WRAPPER}} .featured-items::before, {{WRAPPER}} .gesus-services-categories::before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_control(
            'postssa_card_sha',
            [
                'label' => __( 'Service Card Shadow', 'gesus' ),   
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .featured-items .icon' => 'background: {{VALUE}}',
                ],
            ]
        );

             $this->add_control(
            'postssa_title_acgolorb',
            [
                'label' => __( 'Button Color Secodary', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn.gesus-black-btn:before' => 'background: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),  
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),   
                'selector' => '{{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .featured-items p, {{WRAPPER}} .featured-items h4',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tdtih',
                'label' => __( 'SubTitle Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-section-title h2',
            ]
        );



          $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tse',
                'label' => __( 'Service Details Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-services-categories p',
            ]
        );

           $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tdhtih',
                'label' => __( 'Section Details Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-services-section p.details, {{WRAPPER}} .gesus-services-categories p',
            ]
        );

          $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'tdhssstih',
                'label' => __( 'Button Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .services-title a',
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
Plugin::instance()->widgets_manager->register( new gesus_servicess() );
?>