<section class="gesus-events-section gesus-section">
        <div class="container">
            <div class="gesus-section-title text-center">
                <p><?php esc_html_e($settings['title']); ?></p>
                <h2><?php esc_html_e($settings['info']); ?></h2>
            </div>
            <div class="gesus-events-wrapper">
                <ul class="nav gesus-events-tabs">
                  <?php $categories = get_categories(['taxonomy' => 'event_category',]); 
                      $i = 0;
                      foreach ($categories as $cat) :
                        $i++;
                        $class = $i == 1 ? 'active' : '';
                      ?>
                  <li><a class="<?php echo esc_attr($class); ?>" href="#<?php echo $cat->slug ?>" data-bs-toggle="pill"><?php echo date('j F Y', strtotime(get_term_meta($cat->term_id, 'date', true))) ?> <br> <span><?php echo $cat->name ?></span></a></li>

                  <?php $event = new WP_Query(array(
                            'post_type'     => 'event',
                              'tax_query' => array(
                              array(
                                  'taxonomy' => 'event_category',
                                  'field'    => 'slug',
                                  'terms'    => $cat->slug,
                              ),
                            )
                            ));
                      ?>

                <?php endforeach; ?>
                  </ul>
                  <div class="tab-content gesus-tab-content">
                    <?php 
                    $i = 0;
                    foreach($categories as $cat):
                       $i++;
                       $class = '';
                       if($i == 1){
                        $class = 'active';
                       }
                                $event = new WP_Query(array(
                                'post_type'     => 'event',
                                'tax_query' => array(
                                array(
                                    'taxonomy' => 'event_category',
                                    'field'    => 'slug',
                                    'terms'    => $cat->slug,
                                  ),
                                )
                                ));

                                 ?>
                    <div class="tab-pane fade show <?php echo esc_attr($class); ?>" id="<?php echo esc_attr($cat->slug) ?>">
                        <div class="row">
                               <?php 
                                if($event->have_posts()) : while($event->have_posts()) : $event->the_post();
                              $metadata = get_post_meta(get_the_ID(), '_eventmeta', true);
                              ?>
                            <div class="col-lg-6">
                                <div class="gesus-events-items">
                                    <div class="events-thumb">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/events/img1.png" alt="" class="back-bg">
                                        
                                         <?php  echo get_that_image2($metadata['opt-upload-2'], 'event-thumb'); ?>
                                    </div>
                                    <div class="events-content">
                                          <?php if(!empty($metadata['event_time'])): ?>
                                        <a href="" class="date"><?php echo risset($metadata['event_time']) ?></a> <?php endif; ?>

                                        <a href="<?php the_permalink(); ?>" class="title"><?php the_title(); ?></a>
                                          <?php if(!empty($metadata['spe_nam'])): ?>
                                        <p class="nam"><span><?php echo risset($metadata['spe_nam']) ?>  <?php esc_html_e('-','gesus'); ?></span> <?php esc_html_e('Event Speaker','gesus'); ?></p>
                                        <?php endif; ?>
                                        <a href="<?php the_permalink(); ?>" class="link"><?php esc_html_e('Read More','gesus'); ?>  <i class="far fa-angle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                          <?php 
                           endwhile;
                            wp_reset_postdata();
                            endif;
                             ?>
                        </div>
                    </div>
                        <?php endforeach;  ?>
                  </div>
            </div>
        </div>
   </section>
    <!-- Our Events section end  -->
