<?php 
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class gesus_footer_about extends Widget_Base {

    public function get_name() {
        return 'footer-about';
    }

    public function get_title() {
        return __('Footer about', 'gesus');
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
                'label' => __( 'About', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

           $this->add_control(
            'custom_logo_upload', [
                'label' => __('Choose Custom Logo', 'gesus'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
        $this->add_control(
            'ab_ut',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'multiple' => false,
                'label_block' => true,
                'default' => __( 'About', 'gesus' ),

            ]
        );

           $this->add_control(
            'ab_info',
            [
                'label' => __('Details', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                 'default' => __('orporate clients and leisure travelers has been relying on Groundlink for dependable safe, and professional chauffeured car service in major cities across World.', 'gesus'),
            ]
        );


            $this->add_control(
            'ab_titl',
            [
                'label' => __('Opening Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __('Opening Houres', 'gesus'),
            ]
        );

             $this->add_control(
            'ab_open',
            [
                'label' => __('Opening hours', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __('Mon - Sat(8.00 - 6.00)', 'gesus'),
            ]
        );

            $this->add_control(
            'ab_end',
            [
                'label' => __('Ending hours', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                 'default' => __('Sunday - Closed', 'gesus'),
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
                    'hedd',
                    [
                        'label' => __( 'About Logo Color', 'gesus' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

            $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button',
                'label' => __( 'Logo Color', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .footer-items .gesus-openings .icons',
            ]
        );

            

        $this->end_controls_section();


    }
        
    protected function render() {

            $settings = $this->get_settings_for_display();
 

        ?>
      
              <!-- header start  -->
       
                <div class="footer-items">  
                    <h3 class="footer-title"><?php echo $settings['ab_ut']; ?></h3>
                    <p><?php echo $settings['ab_info']; ?></p>
                    <div class="gesus-openings">
                      
                        <div class="icons">
                            <?php echo  get_that_image($settings['custom_logo_upload']); ?>
                        </div>
                   
                        <div class="content">
                            <h5><?php echo $settings['ab_titl']; ?></h5>
                            <p><?php echo $settings['ab_open']; ?>)</p>
                            <p><?php echo $settings['ab_end']; ?></p>
                        </div>
                    </div>
                </div>
                   


  <?php  }

}
Plugin::instance()->widgets_manager->register( new gesus_footer_about() );