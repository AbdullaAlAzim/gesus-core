    <!--  news & Blogs start   -->
    <section class="gesus-news-blog-section gesus-section">
        <div class="container">
            <div class="gesus-blog-heading">
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="gesus-section-title">
                            <p class="orange-color"><?php echo esc_html('//');?> <?php echo $settings['info2']; ?></p>
                            <h2><?php echo $settings['title2']; ?></h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <p class="heading-right"><?php echo $settings['info_details']; ?></p>
                    </div>
                </div>
            </div>
            <div class="row">
                <?php 
                    if($wp_query->have_posts()) : while($wp_query->have_posts()) : $wp_query->the_post();?>
                <div class="col-lg-4 col-md-6">
                    <div class="gesus-blog-post gesus-blog-card">
                        <a href="<?php echo get_the_permalink(); ?>" class="gesus-post-thumb">
                            <?php 
                              if (has_post_thumbnail()) {
                             the_post_thumbnail('full');
                               }

                            ?>
                        </a>
                        <div class="gesus-blog-card-body">
                            <div class="gesus-post-content">
                                <div class="gesus-post-author">
                                    <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" class="author"><i class="fas fa-user-alt"></i>  By <?php echo get_the_author()?></a>
                                    <a href="<?php echo get_day_link(get_the_time('Y'), get_the_time('M'), get_the_time('j'));?>" class="author-date"><i class="far fa-calendar-alt"></i> <?php the_time('M j, Y');?></a>
                                </div>
                                <a href="<?php the_permalink(); ?>" class="post-title"><?php echo get_the_title(); ?></a>
                                <p><?php echo wp_trim_words(get_the_excerpt(), 8);?></p>
                            </div>
                            <a href="" class="author-profile">
                                 <?php echo get_avatar(get_the_author_meta('ID'), '37'); ?>
                                <span>By <?php echo get_the_author()?></span>
                            </a>
                        </div>
                    </div>
                </div>
                   <?php endwhile; 
            wp_reset_postdata();
            endif; ?>
             
            </div>
        </div>
    </section>
    <!--  news & Blogs end   -->