 <!--  Services start   -->
    <section class="gesus-services-section gesus-section">
        <?php echo get_that_image($settings['image1'],'gesus-side-img'); ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="services-title">
                        <div class="gesus-section-title">
                            <p><?php echo $settings['title']; ?></p>
                            <h2><?php echo $settings['sub_title']; ?><span><?php echo $settings['sub_charecter']; ?></span></h2>
                        </div>
                        <p><?php echo $settings['sub_details']; ?></p>
                        <a <?php echo get_that_link($settings['link']); ?> class="btn gesus-btn gesus-black-btn"><?php echo $settings['button']; ?></a>
                    </div>
                </div>
                  <?php if( !empty($settings['services_list']) ): foreach ($settings['services_list'] as $service):?>
                <div class="col-lg-4 col-md-6">
                    <div class="gesus-services-categories">
                       <?php echo get_that_image($settings['item_bg_img'], 'shape-icon'); ?>
                        <div class="services-icon">
                           <?php echo get_that_image($service['image']); ?>
                        </div>
                        <h3><?php echo $service['title']; ?></h3>
                        <p><?php echo $service['info']; ?></p>
                        <a href="<?php echo get_post_type_archive_link( 'sermons' ); ?>" class="btn gesus-ctg-btn"><i class="fal fa-long-arrow-right"></i></a>
                    </div>
                </div>
                  <?php endforeach; endif; ?>
            </div>
        </div>
    </section>
    <!--  Services end   -->