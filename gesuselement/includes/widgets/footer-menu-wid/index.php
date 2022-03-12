<?php 
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class gesus_footer_nav extends Widget_Base {

    public function get_name() {
        return 'footer-nav';
    }

    public function get_title() {
        return __('Footer nav', 'gesus');
    }

    public function get_icon() {
        return 'eicon-nav-menu';
    }

    public function get_categories() {
        return array('gesus-header');
    }

    protected function _register_controls() {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __( 'Footer Menu', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'fter_title',
            [
                'label' => __('footer widget Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                 'default' => __( 'Useful Links', 'gesus' ),
                'multiple' => false,
                'label_block' => true,
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
            'link_f', [
                'label' => __('Link', 'gesus'),
                'type' => Controls_Manager::TEXT,
              
            
            ]
        );
        $this->add_control(
            'nav_list',
            [
                'label' => __( 'Nav List', 'gesus' ),
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
            'sub_menu_style',
            [
                'label' => __( 'Sub Menu', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'sub_color',
            [
                'label' => __( 'Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .footer-items> ul> li> a:hover, .footer-items> ul> li> a:focus' => 'color: {{VALUE}} !important',
                ],
            ]
        );
   
   
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sub_fonts',
                'label' => __( 'Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .header-main-menu ul > li .dropdown-menu > li > a',
            ]
        );
      
        $this->end_controls_section();

        $this->start_controls_section(
            'mobile_style',
            [
                'label' => __( 'Mobile Menu', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'm_color',
            [
                'label' => __( 'Main Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .str-mobile_menu_content .str-mobile-main-navigation .navbar-nav > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'm_fonts',
                'label' => __( 'Main Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .str-mobile_menu_content .str-mobile-main-navigation .navbar-nav > li a',
            ]
        );
        $this->add_control(
            's_color',
            [
                'label' => __( 'Sub Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .str-mobile_menu_content .str-mobile-main-navigation .navbar-nav > li ul > li a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 's_fonts',
                'label' => __( 'Sub Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .str-mobile_menu_content .str-mobile-main-navigation .navbar-nav > li ul > li a',
            ]
        );
    
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'tbg',
                'label' => __( 'Main BG', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'show_label' => true,
                'selector' => '{{WRAPPER}} .str-mobile_menu_content',
            ]
        );

        $this->end_controls_section();

    }
        
    protected function render() {

        $settings = $this->get_settings();

        ?>
      
           
            <div class="footer-items">
                <h3 class="footer-title"><?php echo $settings['fter_title']; ?></h3>
                <ul>
                       <?php if( !empty($settings['nav_list']) ): foreach ($settings['nav_list'] as $service):?>

                    <li><a href="<?php echo $service['link_f']; ?>"><i class="icon fas fa-angle-right"></i> <?php echo $service['title']; ?></a></li>
                       <?php endforeach; endif; ?>
                  
                </ul>
            </div>
                   

  <?php  }

}
Plugin::instance()->widgets_manager->register( new gesus_footer_nav() );