<?php 
namespace Elementor;

if (!defined('ABSPATH'))
    exit; // Exit if accessed directly


class gesus_nav_builder_two extends Widget_Base {

    public function get_name() {
        return 'headertwo';
    }

    public function get_title() {
        return __('Header Two', 'gesus');
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
                'label' => __( 'Main Nav', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'main_nav',
            [
                'label' => __('Main Menu', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' =>  king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );
        $this->add_control(
            'main_m_nav',
            [
                'label' => __('Mobile Menu', 'gesus'),
                'type' => Controls_Manager::SELECT2,
                'options' =>  king_menu_select_choices(),
                'multiple' => false,
                'label_block' => true,
            ]
        );

         $this->add_control(
            'custom_logo_upload',
            [
                'label' => __( 'Choose Custom Logo', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'menu_style',
            [
                'label' => __( 'Main Menu', 'gesus' ),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_color',
            [
                'label' => __( 'Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-main-menu ul li a, {{WRAPPER}}' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'nav_fonts',
                'label' => __( 'Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .header-nav-style .main-navigation-area ul > li a',
            ]
        );
   
        $this->end_controls_section();

    }
    protected function render() {
        $settings = $this->get_settings();
        $main_menu = $settings['main_nav'];
        $mobile_menu = $settings['main_m_nav'];
           $custom_logo_id = get_theme_mod( 'custom_logo' );

        if ( $settings['custom_logo_upload']['id'] ) {
            $url = wp_get_attachment_image( $settings['custom_logo_upload']['id'], 'full' );
        } else {
            $url = wp_get_attachment_image( $custom_logo_id, 'full' );
        }

        ?>
    <!-- header start  -->
    <header class="gesus-header-section-two">
        <div class="gesus-main-menu-header-two">
            <div class="container">
                <div class="gesus-main-menu-header-wraper">
                    
                     <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="header-logo" title="<?php esc_attr_e( 'Home', 'gesus' ); ?>" rel="home">
                    <?php
                        echo $url;
                    ?>
                  </a>
                    <div class="main-menu-wrapper">
                        <div class="gesus-main-menu-two">
                           <?php
                        echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu'],
                            wp_nav_menu( array(
                                    'container' => false,
                                    'echo' => false,
                                    'menu_id' => 'main-menu',
                                    'theme_location' => 'primary',
                                     'menu' =>    $main_menu,
                                    'fallback_cb'=> 'gesus_no_main_nav',
                                    'items_wrap' => '<ul>%3$s</ul>',
                                )
                            ));
                        ?>
                        </div>
                    </div>

                    <div class="menu-right-side">
                        <ul>
                            <li><a href="<?php echo get_permalink( get_option('woocommerce_myaccount_page_id') ); ?>"><i class="fas fa-user-alt"></i></a></li>
                            <li><a data-bs-toggle="offcanvas" href="#offcanvasExample" role="button"
                                   aria-controls="offcanvasExample"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/basket.svg" alt=""> <span class="gesus-cart-count"></span></a></li>
                            <li><a href="#" id="search-modal"><i class="far fa-search"></i></a></li>

                        </ul>
                        <div class="d-lg-none">
                            <button type="button" class="gesus-nav-open">
                                <span></span>
                                <span></span>
                                <span></span>
                            </button>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>
      <!-- search modal -->
    <div class="mnmd-search-full">
        <form action="<?php echo esc_url( home_url( '/' ) ); ?>">
            <input type="text" name="s" class="form-control" placeholder="Enter your keywords" value="<?php echo get_search_query(); ?>" name="s">
            <span id="mnmd-search-remove"><i class="fal fa-times"></i></span>
        </form>
    </div>
    <!-- search modal end -->
      <!-- mobile menu start  -->
    <div class="gesus-overlay"></div>
    <div class="gesus-mobile-menu">
        <div class="nav-close"><i class="fal fa-times"></i></div>
        <?php
            echo str_replace(['menu-item-has-children', 'sub-menu'], ['dropdown', 'dropdown-menu'],
                wp_nav_menu( array(
                        'container' => false,
                        'echo' => false,
                        'menu_id' => 'main-menu',
                        'theme_location' => 'primary',
                         'menu' =>    $main_menu,
                        'fallback_cb'=> 'gesus_no_main_nav',
                        'items_wrap' => '<ul>%3$s</ul>',
                    )
                ));
            ?>
    </div>
    <!-- mobile menu end  -->
  <?php  }

}
Plugin::instance()->widgets_manager->register( new gesus_nav_builder_two() );