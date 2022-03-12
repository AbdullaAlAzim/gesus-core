   <!--  Contact section start  -->
    <section class="gesus-contact-pages gesus-section">
        <div class="container">
            <div class="gesus-events-organizer">
                <div class="row">
                      <?php if( !empty($settings['contact_list']) ): foreach ($settings['contact_list'] as $service):?>
                    <div class="col-lg-4">
                        <div class="gesus-events-organizer-items">
                            <div class="icon"><?php echo  get_that_image($service['icon']) ?></div>
                            <div class="content">
                                <h4><?php echo $service['contact_title']; ?></h4>
                                <p><?php echo $service['contact_des']; ?></p>
                            </div>
                        </div>
                    </div>
                      <?php endforeach; endif; ?>
                </div>
            </div>
            <div class="gesus-contact-form-wrapper">
                <?php echo  get_that_image($settings['image_bg'], 'shape-one') ?>
                <div class="contact-form">
                    <div class="form-title">
                        <h4><?php echo $settings['title']; ?></h4>
                        <p><?php echo $settings['sub_title']; ?></p>
                    </div>
                   <?php echo do_shortcode($settings['form']); ?>
                </div>
            </div>
        </div>
    </section>
    <!--  Contact  section end  -->