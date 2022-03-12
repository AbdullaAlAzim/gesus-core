    <!--  Services start   -->
<section class="gesus-core-services-section gesus-section pt-0">
        <?php echo get_that_image($settings['image2'], 'services-right-img') ?>
          <?php echo get_that_image($settings['image3'], 'services-left-img') ?>
        <div class="container">
            <div class="core-services-wrapper">
                <div class="gesus-section-title">
                    <p class="orange-color"><?php echo $settings['sub_char']; ?> <?php echo $settings['title']; ?></p>
                    <h2><?php echo $settings['sub_title']; ?></h2>
                </div>
            </div>

            <div class="featured-items-wrapper">
                  <?php if( !empty($settings['services_list']) ): foreach ($settings['services_list'] as $service):?>
                <div class="featured-items">
                    <div class="icon">
                        <?php echo get_that_image($service['image']); ?>
                    </div>
                    <h4><?php echo $service['title']; ?></h4>
                    <p class="sr"><?php echo $service['info']; ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn gesus-btn"><?php esc_html_e('Read More','gesus'); ?></a>
                </div>
             <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
    <!--  Services end   -->