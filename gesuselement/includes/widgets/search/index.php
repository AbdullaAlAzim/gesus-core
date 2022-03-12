<?php

namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_search extends Widget_Base
{
    public function get_name()
    {
        return 'gesus-search';
    }

    public function get_title()
    {
        return __('Gesus Search', 'gesus');
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
                'label' => __('Search', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => __('Title', 'gesus'),
                'type' => Controls_Manager::TEXT,
                'default' => __('Search', 'gesus'),
            ]
        );
        $this->add_control(
            'btn_color',
            [
                'label' => __('BG Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-sub' => 'background-color: {{VALUE}}',
                ],
            ]
        );

         $this->add_control(
            'btn_ico',
            [
                'label' => __('Button Icon', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-input-group i' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btnc_color',
            [
                'label' => __('Button Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .btn-sub' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->end_controls_section();

    }

    protected function render()
    {

    $settings = $this->get_settings_for_display();?>   
 <div class="gesus-wedgets-area">
    <div class="gesus-wedgets widget">
            <h2 class="wedgets-title"><?php echo $settings['title']; ?></h2>
            <form id="searchform" action="<?php echo esc_url(home_url()); ?>" method="get">
            <div class="gesus-input-group">
            <input type="text" name="s" placeholder="Search keywords">
            <button class="gesus-btn"><i class="fal fa-search"></i></button>
            </div>
        </form>
    </div>
</div>
<?php 
      
    }

}

Plugin::instance()->widgets_manager->register(new gesus_search());
?>