<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_sermons_audio extends Widget_Base
{

    public function get_name()
    {
        return 'sermons-audio';
    }

    public function get_title()
    {
        return __('Sermons audio', 'gesus');
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
                'label' => __('Sermons audio', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __( 'LEATEST SERMONS', 'gesus' ),
            ]
        );

         $this->add_control(
            'Subtitle',
            [
                'label' => __( 'Subtitle', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'Preaching. Worship.
                An Online Family.', 'gesus' ),
            ]
        );


         $this->add_control(
            'details',
            [
                'label' => __( 'Section details', 'gesus' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __( 'We want to welcome you at the church where you find people who worship Jesus and are passionate about spreading His Word. Salvation We are a Buddhist temple built in 1982, and we are at the service of the', 'gesus' ),
            ]
        );
      
       $this->add_control(
            'audio',
            [
                'label' => __( 'audio', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'media_type'    => 'audio',
                
            ]
        );

          $this->add_control(
            'image', [
                'label' => __( 'Left Background Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'image_1', [
                'label' => __( 'Right Background Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

    $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'member_name',
            [
                'label' => __('Name', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('Social Icons', 'gesus'),
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
                'label' => __( 'Icon', 'gesus' ),
                'type' => \Elementor\Controls_Manager::ICONS,
                'default' => [
                    'value' => 'fab fa-twitter',
                    'library' => 'brand',
                ],
            ]
        );

        $this->add_control(
            'member_list',
            [
                'label' => __('Social Icons', 'gesus'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'member_name' => __('Facebook', 'gesus'),
                    ],
                    [
                        'member_name' => __('Twitter', 'gesus'),
                    ],
                    [
                        'member_name' => __('Instagram', 'gesus'),
                    ],
                    [
                        'member_name' => __('Youtube', 'gesus'),
                    ],
                ],
                'title_field' => '{{{ member_name }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'content_sty',
            [
                'label' => __('Style', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'post_inhaa_color',
            [
                'label' => __('Meta Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-meta ul li' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihiaai',
                'label' => __('Meta Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-meta ul li',
            ]
        );
        $this->add_control(
            'post_title_color',
            [
                'label' => __('Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttih',
                'label' => __('Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc h5',
            ]
        );
        $this->add_control(
            'post_des_color',
            [
                'label' => __('Excerpt Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc h5' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihexc',
                'label' => __('Excerpt Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc p',
            ]
        );
        $this->add_control(
            'post_btn_color',
            [
                'label' => __('Button Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .blog-box .blog-desc .btn-2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihbtn',
                'label' => __('Button Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .blog-box .blog-desc .btn-2',
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

    protected function render()
    {

        $settings = $this->get_settings_for_display();
    ?>
    <!--  Leatest Sermons start   -->
    <section class="gesus-leatest-sermons-section" id="ap">
         <?php echo get_that_image($settings['image_1'], 'section-right-img'); ?>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="gesus-leatest-sermons-thumb">
                       <?php echo get_that_image($settings['image']); ?>
                        <!-- Audio player -->
                        <div class="gesus-player-area">
                            <div class="gesus-gesus-audio">
                                <audio class="js-player" crossorigin playsinline>
                                    <source src="<?php echo $settings['audio']['url']; ?>">
                                </audio>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gesus-sermons-rightside-content">
                        <div class="gesus-section-title">
                            <p><?php echo $settings['title']; ?></p>
                            <h2><?php echo $settings['Subtitle']; ?></h2>
                        </div>
                        <p><?php echo $settings['details']; ?></p>
                        <ul class="gesus-social-link">
                            <?php  foreach ($settings['member_list'] as $member): ?>
                            <li><a <?php echo get_that_link($member['url1']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon1']); ?></a></li>
                        <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Leatest Sermons end   -->

<?php 
      
    }

}
Plugin::instance()->widgets_manager->register(new gesus_sermons_audio());
