 <!--  news & Blogs start   -->
 <section class="gesus-news-and-blog-section gesus-section">
        <div class="container">
            <div class="gesus-section-title text-center">
                <p><?php echo $settings['info']; ?></p>
                <h2><?php echo $settings['title']; ?></h2>
            </div>
            <div class="row">
                   <?php 
                    if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();?>

                <div class="col-lg-4 col-md-6">
                    <div class="gesus-blog-post">
                        <a href="<?php echo get_the_permalink(); ?>" class="gesus-post-thumb">
                            <?php 
                              if (has_post_thumbnail()) {
                             the_post_thumbnail('full');
                               }

                            ?>
                            <span class="btn gesus-btn"><?php gesus_loop_category(); ?></span>
                        </a>
                        <div class="gesus-post-content">
                            <div class="gesus-post-author">
                                  <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('M'), get_the_time('j'));?>" class="author-date"><i class="far fa-calendar-alt"></i> <?php the_time('M j, Y');?></a>
                                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" class="author"><i class="fas fa-user-alt"></i>  <?php echo esc_html('By');?> <?php echo get_the_author()?></a>
                            </div>
                            <a href="<?php echo get_the_permalink(); ?>" class="post-title"><?php echo get_the_title(); ?></a>
                        </div>
                    </div>
                </div>
                <?php 

               endwhile;endif; 
                 ?>
            </div>
        </div>
    </section>