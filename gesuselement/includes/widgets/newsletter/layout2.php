<div class="gesus-footer-top">
                <div class="row">
                    <div class="col-lg-6">
                        <h3><?php echo esc_html('Still You Need Our');?> <span><?php echo esc_html('Support');?></span> ?</h3>
                        <p><?php echo esc_html('Don’t wait make a smart & logical quote here. Its pretty easy.');?></p>
                    </div>
                    <div class="col-lg-6">
                        <div class="gesus-subscribe">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer/img1.png" alt="">
                            <!-- <input class="form-control" type="email" placeholder=" Enter Your Email">
                            <button class="btn gesus-btn">Subscribe Now</button> -->

                            <?php echo do_shortcode($settings['form1']); ?>
                        </div>
                    </div>
                </div>
            </div>