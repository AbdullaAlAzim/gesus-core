<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_banner extends Widget_Base
{
    public function get_name()
    {
        return 'gesus-banner';
    }

    public function get_title()
    {
        return __('Gesus Banner', 'gesus');
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
            'sub_info',
            [
                'label' => __('Banner Summary', 'gesus'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => __('Jesus Culture is a community of worship leaders whose heart is generation impacted by encounters with presence.', 'gesus'),
            ]
        );
    
        $this->add_control(
            'photo_one', [
                'label' => __( 'Banner right Image one', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'photo_two', [
                'label' => __( 'Banner right Image two', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'photo_left', [
                'label' => __( 'Banner left Image One', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

          $this->add_control(
            'photo_leftt', [
                'label' => __( 'Banner left Image two', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

           $this->add_control(
            'shapp_ima', [
                'label' => __( 'Banner Shape Image', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'button',
            [
                'label' => __('Button Name', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Donate Now', 'gesus'),
            ]
        );
           $this->add_control(
            'btn_link', [
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
            'link', [
                'label' => __('Video Link', 'gesus'),
                'type' => Controls_Manager::URL,
                'show_external' => true,
                'default' => [
                    'url' => '#',
                    'is_external' => true,
                    'nofollow' => true,
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
                    '{{WRAPPER}} .fun-fact .fun-desc .timer' => 'color: {{VALUE}}',
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
                    '{{WRAPPER}} .fun-fact .fun-desc .medium' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'ttihaa',
                'label' => __( 'Content Typography', 'gesus' ),
                'selector' => '{{WRAPPER}} .fun-fact .fun-desc .medium',
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

    $settings = $this->get_settings();
?>

<section class="gesus-hope-is-alive-section">
        <div class="gesus-alive-banner-wrapper">
            <div class="row">
                <div class="col-lg-6">
                    <div class="gesus-alive-banner-lefttside">
                        <?php echo  get_that_image($settings['photo_left'], 'shape1'); ?>
                        <?php echo  get_that_image($settings['photo_leftt'], 'shape2'); ?>
                        <div class="gesus-alive-banner-content">
                            <div class="gesus-section-title">
                                <p class="orange-color">//<?php echo $settings['sub_title'];?></p>
                                <h2><?php echo esc_html($settings['title']);?></h2>
                            </div>
                            <p><?php echo esc_html($settings['sub_info']);?> </p>   
                            <div class="button-group">
                                <a href="<?php echo esc_attr($settings['btn_link']['url']);?>" class="btn gesus-btn black-orange-btn"><?php echo $settings['button']; ?></a>
                                <a href="<?php echo esc_attr($settings['link']['url']);?>" class="gesus-play-btn orange" data-lity><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gesus-alive-banner-right-side gesus-data-background" data-background="<?php echo $settings['shapp_ima']['url'];?>">
                        <div class="gesus-alive-banner-thumb">
                             <?php echo  get_that_image($settings['photo_one']); ?>
                             <?php echo  get_that_image($settings['photo_two']); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </section>
       
<?php 
      
    }

}

Plugin::instance()->widgets_manager->register(new gesus_banner());
