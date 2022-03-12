<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_team extends Widget_Base
{

    public function get_name()
    {
        return 'gesus-team';
    }

    public function get_title()
    {
        return __('Team', 'gesus');
    }

    public function get_categories()
    {
        return ['gesuselement-addons'];
    }

    public function get_icon()
    {
        return 'eicon-person';
    }

    protected function _register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => __('Content', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Company Leadership', 'gesus'),
            ]
        );
        $this->add_control(
            'sub_title',
            [
                'label' => __('Sub Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Company Leadership', 'gesus'),
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __('Name', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Al Mahmud', 'gesus'),
            ]
        );
        $repeater->add_control(
            'member_designation',
            [
                'label' => __('Designation', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Founder & CEO', 'gesus'),
            ]
        );
        $repeater->add_control(
            'member_photo', [
                'label' => __('Photo', 'gesus'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );
  
      $repeater->add_control(
            'url1',
            [
                'label' => __('Link 1', 'gesus'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'icon1',
            [
                'label' => __( 'Icon 1', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-twitter',
                    'library' => 'brand',
                ],
            ]
        );

        $repeater->add_control(
            'url2',
            [
                'label' => __('Link 2', 'gesus'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'icon2',
            [
                'label' => __( 'Icon 2', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-facebook',
                    'library' => 'brand',
                ],
            ]
        );
        $repeater->add_control(
            'url3',
            [
                'label' => __('Link 3', 'gesus'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'icon3',
            [
                'label' => __( 'Icon 3', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-youtube',
                    'library' => 'brand',
                ],
            ]
        );
        $repeater->add_control(
            'url4',
            [
                'label' => __('Link 4', 'gesus'),
                'type' => \Elementor\Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
                ],
            ]
        );
        $repeater->add_control(
            'icon4',
            [
                'label' => __( 'Icon 4', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-pinterest',
                    'library' => 'brand',
                ],
            ]
        );
       
        $this->add_control(
            'member_list',
            [
                'label' => __('List', 'gesus'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __('Al Mahmud', 'gesus'),
                    ],
                    [
                        'member_name' => __('Al Mahmud', 'gesus'),
                    ],
                    [
                        'member_name' => __('Al Mahmud', 'gesus'),
                    ],
                    [
                        'member_name' => __('Al Mahmud', 'gesus'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
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
            'title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title p' => 'color: {{VALUE}}',
                ],
            ]
        );

             $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'title_fonts',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-section-title p',
            ]
        );


          $this->add_control(
            'stitle_color',
            [
                'label' => __('SubTitle Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'stitle_fonts',
                'label' => __('SubTitle Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-section-title h2',
            ]
        );
        $this->add_control(
            'des_color',
            [
                'label' => __('Designation Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-team-card .card-body p' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'des_fonts',
                'label' => __('Designation Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-team-card .card-body p',
            ]
        );




          $this->add_control(
            'mem_color',
            [
                'label' => __('Member Name Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-team-card .card-body .card-title' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'mem_fonts',
                'label' => __('Member Name Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-team-card .card-body .card-title',
            ]
        );




        $this->add_control(
            'ic_color',
            [
                'label' => __('Social Icon Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-team-card .card-thumb .gesus-action a' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'ic_colorb',
            [
                'label' => __('Social Icon BG', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-team-card .card-thumb .gesus-action a' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'ic_colorbh',
            [
                'label' => __('Social Icon Hover BG', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-team-card .card-thumb .gesus-action a:hover' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'social_bg',
            [
                'label' => __( 'Team Hover Color', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_socials_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-team-card .card-thumb::after',
            ]
        );

          $this->add_control(
            'sec_bg',
            [
                'label' => __( 'Section BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::HEADING,
                'separator' => 'after',
            ]
        );

         $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'team_sec_bg',
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-team-section',
            ]
        );

        $this->end_controls_section();
    }

   protected function render()
    {
        $settings = $this->get_settings_for_display();?>
 <!--  team section start   -->
    <section class="gesus-team-section gesus-section">
        <div class="container">
            <div class="gesus-section-title text-center">
                <p><?php echo $settings['sub_title']; ?></p>
                <h2><?php echo $settings['title']; ?></h2>
            </div>
            <div class="gesus-team-wrapper">
                <div class="row">
                     <?php if( !empty($settings['member_list']) ): foreach ($settings['member_list'] as $member):?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="card gesus-team-card">
                            <div class="card-thumb">
                                <?php echo get_that_image($member['member_photo']); ?>
                                <div class="gesus-action">
                                    <a <?php echo get_that_link($member['url1']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon1']); ?></a>
                                    <a <?php echo get_that_link($member['url2']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon2']); ?></a>
                                    <a <?php echo get_that_link($member['url3']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon3']); ?></a>
                                    <a <?php echo get_that_link($member['url4']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon4']); ?></a>
                                </div>
                            </div>
                            <div class="card-body">
                                <p><?php echo $member['member_designation']; ?></p>
                                <span class="card-title"><?php echo $member['member_name']; ?></span>
                            </div>
                        </div>
                    </div>
                     <?php endforeach; wp_reset_query(); endif; ?>
                </div>
            </div>
        </div>
    </section>
    <!--  team section end   -->
<?php 
      
    }

}
Plugin::instance()->widgets_manager->register(new gesus_team());
?>