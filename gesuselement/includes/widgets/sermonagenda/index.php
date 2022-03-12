<?php

namespace Elementor;

if (!defined('ABSPATH')) exit; // Exit if accessed directly

class gesus_sermons_agend extends Widget_Base
{

    public function get_name()
    {
        return 'gesus-sermons-agend';
    }

    public function get_title()
    {
        return __('Sermon Agenda', 'gesus');
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
                'label' => __('Section Title', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => __('SERMONS AGENDA', 'gesus'),
            ]
        );
         $this->add_control(
            'sub',
            [
                'label' => __('Section Subtitle', 'gesus'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => __('Church Urges Government
                 Address Poverty', 'gesus'),
            ]
        );

           $this->add_control(
            'image1',
            [
                'label' => __( 'Section Animation BG', 'gesus' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
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
            'subtitle_color',
            [
                'label' => __('Sub Title Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .gesus-section-title h2' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(    
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'subtitle_fonts',
                'label' => __('Sub Title Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-section-title h2',
            ]
        );

           $this->add_control(
            'sermon_color',
            [
                'label' => __('Sermon Info Color', 'gesus'),
                'type' => \Elementor\Controls_Manager::COLOR, 
                'selectors' => [
                    '{{WRAPPER}} .gesus-tabs-table table tr th, {{WRAPPER}} .tab-content tbody tr td' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_group_control(    
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sermon_fonts',
                'label' => __('Sermon Info Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-tabs-table table tr th, {{WRAPPER}} .tab-content tbody tr td',
            ]
        );
           $this->add_control(
                    'hed',
                    [
                        'label' => __( 'Sermon Hover', 'gesus' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

            $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),    
            [
                'name' => 'background',
                'label' => __( 'Background', 'gesus' ),    
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-table-hover table tr:hover, .gesus-table-hover table tr:focus, {{WRAPPER}} .gesus-nav-pills li a.active',
            ]
        );


               $this->add_control(
                    'hedd',
                    [
                        'label' => __( 'Sermon Button', 'gesus' ),
                        'type' => \Elementor\Controls_Manager::HEADING,
                        'separator' => 'before',
                    ]
                );

            $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button',
                'label' => __( 'Sermon Button', 'gesus' ),
                'types' => [ 'classic', 'gradient' ],
                'selector' => '{{WRAPPER}} .gesus-btn.white-btn:before, {{WRAPPER}} .gesus-table-hover table tr:hover td .gesus-btn',
            ]
        );

             $this->add_group_control(    
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'sermon_btfonts',     
                'label' => __('Sermon Button Typography', 'gesus'),
                'selector' => '{{WRAPPER}} .gesus-tabs-table table tr td .gesus-btn, {{WRAPPER}} .gesus-nav-pills li a',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings();
    ?>
<!--  Sermons Agenda start   -->
    <section class="gesus-sermons-agenda-section gesus-section">
        <?php echo get_that_image($settings['image1'],'gesus-agenda-shape'); ?>
        <div class="container">
            <div class="gesus-section-title text-center">
                <p><?php esc_html_e($settings['title']); ?></p>
                <h2><?php esc_html_e($settings['sub']); ?></h2>
            </div>
            <ul class="nav nav-pills gesus-nav-pills" id="pills-tab">

                <?php $categories = get_categories(['taxonomy' => 'agenda_category',]); 
       
              $i = 0;
            foreach ($categories as $cat) {
              $i++;
              $class = $i == 1 ? 'active' : '';
                echo '<li><a class="'. $class.'" href="#'.$cat->name.'" data-bs-toggle="pill">'.$cat->name.'</a></li>';
                
            }

            ?>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <?php $i = 0;  foreach ($categories as $cat): $i++;  ?>
                 
                <div class="tab-pane fade show <?php if($i == 1) echo "active"; ?> " id="<?php echo $cat->name?>">
                    <div class="gesus-tabs-table gesus-table-hover">
                        <table>
                            <tr>
                              <th scope="col"><?php esc_html_e('Time','gesus'); ?></th>
                              <th scope="col"><?php esc_html_e('Sermons Themes','gesus'); ?></th>
                              <th scope="col"><?php esc_html_e('Teachers (s)','gesus'); ?></th>
                              <th scope="col"><?php esc_html_e('Book','gesus') ?></th>
                            </tr>

                              <?php 
                            $sermons_member = new \WP_Query(array(
                            'post_type'     => 'agenda',
                                'tax_query' => array(
                              array(
                                  'taxonomy' => 'agenda_category',
                                  'field'    => 'slug',
                                  'terms'    => $cat->slug,
                              ),
                          ),
                           
                          )
                        );
                         ?>
                        <?php if($sermons_member->have_posts()) : while($sermons_member->have_posts()) : $sermons_member->the_post(); ?>
                          <?php 
                            $meta_agent = get_post_meta(get_the_ID(), '_agentmeta', true);
                             ?>
                              <tr>
                              <td><?php echo $meta_agent['ser_times'] ?></td>
                              <td><?php echo $meta_agent['ser_thems'] ?></td>
                              <td><?php echo $meta_agent['ser_Tea'] ?></td>
                             
                              <td>
                                <?php if(!empty($meta_agent['ser_but'])): ?>
                                  <a href="<?php the_permalink(); ?>" class="btn gesus-btn white-btn"><?php echo esc_attr($meta_agent['ser_but']); ?></a>
                                <?php endif; ?>
                              
                              </td>
                            </tr>
                            
                           <?php endwhile; endif; ?>
                          </table>
                    </div>
                </div>
                <?php endforeach; ?>
              </div>
        </div>
    </section>
    <!--  Sermons Agenda end   -->

<?php 
      
    }

}
Plugin::instance()->widgets_manager->register(new gesus_sermons_agend());
