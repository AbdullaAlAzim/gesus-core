<?php
namespace Elementor;
if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_woo_wid_searchh extends Widget_Base
{

    public function get_name()
    {
        return 'gesusproductsearch';
    }

    public function get_title()
    {
        return __('Woo Products Search', 'gesus');
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
                'label' => __('Products Search', 'gesus'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'btn_color',
            [
                'label' => __('BG Color', 'moda'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn' => 'background-color: {{VALUE}}',
                ],
            ]
        );
        $this->add_control(
            'btnc_color',
            [
                'label' => __('Button Color', 'moda'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-btn' => 'color: {{VALUE}}',
                ],
            ]
        );

       
        $this->end_controls_section();

    }
    protected function render()
    {

        $settings = $this->get_settings_for_display();

        ?>
        <div class="product-search">
	        <div class="input-group">
	        	<form id="searchform" action="<?php echo home_url('/');?>"  method="get">
	            <input class="form-control" type="text" placeholder="Search Product" name="s" value="">
	             </form>
	            <button class="btn gesus-btn"><i class="fas fa-search"></i></button>
	        </div>

	    </div>
        <?php

    }

}
Plugin::instance()->widgets_manager->register(new gesus_woo_wid_searchh());
?>