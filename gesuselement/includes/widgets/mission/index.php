<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_mission extends Widget_Base
{
    public function get_name()
    {
        return 'gesus-mission';
    }

    public function get_title()
    {
        return __('Gesus Mission', 'gesus');
    }

    public function get_categories()
    {
        return ['gesuselement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-posts-group';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Banner', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Banner', 'gesus'),
            ]
        );


        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Tile', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Banner', 'gesus'),
            ]
        );

         $this->add_control(
            'Bd_img', [
                'label' => __( 'Left Background Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

         $this->add_control(
            'Bd_shap', [
                'label' => __( 'Right Background Shape', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );



           $this->add_control(
            'vd_link', [
                'label' => __('Video Link', 'gesus'),
                'type' => Controls_Manager::URL,
              
                'show_external' => true,
                'default' => [
                    'url' => 'https://www.youtube.com/watch?v=XqSXQkj_FnI',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Our Value', 'gesus' ),
            ]
        );
       $repeater->add_control(
            'info',
            [
                'label' => __( 'Info', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Al-Mahmud', 'gesus' ),
            ]
        );
        $this->add_control(
            'tab_list',
            [
                'label' => __( 'Client List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,

                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'title' => __( 'Al-Mahmud', 'gesus' ),
                    ],
                    [
                        'title' => __( 'Al-Mahmud', 'gesus' ),
                    ],
                    [
                        'title' => __( 'Al-Mahmud', 'gesus' ),
                    ],
                

                ],
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

 $this->start_controls_section(
            'content_se',
            [
                'label' => __('Mission List', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'titlee',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'Al-Mahmud', 'gesus' ),
            ]
        );
   
        $this->add_control(
            'mis_list',
            [
                'label' => __( 'Client List', 'gesus' ),
                'type' => \Elementor\Controls_Manager::REPEATER,

                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'titlee' => __( 'Preaching Worship An Online Family', 'gesus' ),
                    ],
                    [
                        'titlee' => __( 'Preaching Worship An Online Family', 'gesus' ),
                    ],
                    [
                        'titlee' => __( 'Preaching Worship An Online Family', 'gesus' ),
                    ],
                

                ],
                'title_field' => '{{{ titlee }}}',
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
                    '{{WRAPPER}} .gesus-mission-content-wrapper .gesus-section-title h2, {{WRAPPER}} .gesus-section-title p, {{WRAPPER}} .gesus-mission-content-wrapper .nav li a.active' => 'color: {{VALUE}}',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => __( 'Background', 'gesus' ), 
                'types' => [ 'classic'],
                'selector' => '{{WRAPPER}} .gesus-mission-content-wrapper .nav li a.active, {{WRAPPER}} .gesus-mission-content-wrapper .nav li a:after',
            ]
        );


        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __( 'Title Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-mission-content-wrapper .gesus-section-title h2, {{WRAPPER}} .gesus-section-title p',
            ]
        );
        $this->add_control(       
            'hh_c',
            [
                'label' => __( 'Content Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-mission-content-wrapper .gesus-mission-list li, {{WRAPPER}} .gesus-mission-content-wrapper .gesus-mission-list li i, {{WRAPPER}} .gesus-mission-content-wrapper .tab-content .tab-pane p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control( 
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .gesus-mission-content-wrapper .gesus-mission-list li, {{WRAPPER}} .gesus-mission-content-wrapper .tab-content .tab-pane p, {{WRAPPER}} .gesus-mission-content-wrapper .nav li a',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

    $settings = $this->get_settings();
echo '<!--  Our Mission start   -->
    <section class="gesus-our-mission-section">
        <div class="gesus-our-mission-wrapper gesus-data-background" data-background="'.$settings['Bd_img']['url'].'">

            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3">
                        <div class="gesus-mission-video">
                            <a href="' . $settings['vd_link']['url'] . '" class="gesus-play-btn orange" data-lity><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="gesus-mission-content-wrapper gesus-data-background" data-background="'.$settings['Bd_shap']['url'].'">
                            <div class="gesus-section-title">
                                <p class="orange-color">// Our Mission</p>
                                <h2>Pray! And listen to God! You can do this </h2>
                            </div>


                            <ul class="nav">';
                                if ($settings['tab_list']) {
                                    $index = 0;
                                    foreach($settings['tab_list'] as $tab){
                                        $index++;
                                        if ($index == 1) {
                                            $act = 'active';
                                        }else{
                                            $act = '';
                                        }

                                        echo '<li><a class="'.$act.'" data-bs-toggle="pill" href="#tablist'.$tab['_id'].'">'.$tab['title'].'</a></li>';
                                    }
                                   
                                }
                                
                           echo'</ul>
                            <div class="tab-content" id="pills-tabContent">';
                                if ($settings['tab_list']) {
                                    $index2 = 0;
                                    foreach($settings['tab_list'] as $tab){
                                        $index2++;
                                        if ($index2 == 1) {
                                            $act2 = 'show active';
                                        }else{
                                            $act2 = '';
                                        }
                                        echo '<div class="tab-pane fade '.$act2.'" id="tablist'.$tab['_id'].'">
                                    <p>'.$tab['info'].'</p>
                                </div>';
                                    }
                                   
                                }
                           echo'</div>


                            <ul class="gesus-mission-list">
                                <ul>';
                                      if ($settings['mis_list']) {
                               
                                    foreach($settings['mis_list'] as $tab){

                                    echo'<li><i class="far fa-check"></i> '.$tab['titlee'].'</li>';
                                         }
                                   
                                       }
                                    echo'</ul>
                               </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Our Mission end   -->';
    }
}
Plugin::instance()->widgets_manager->register(new gesus_mission());
