    <!--  Testimonial start   -->
    <section class="gesus-testimonial-section testimonial-two gesus-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="gesus-section-title">
                        <p class="orange-color"><?php echo $settings['aa_special']; ?> <?php echo $settings['sub_titlez']; ?></p>
                        <h2><?php echo $settings['titlez']; ?></h2>
                    </div>
                    <div class="testimonial-slide-wrapper testimonial-wrapper-two swiper-container">
                        <div class="swiper-wrapper">
                            <?php if(($settings['member_list']) ): foreach ($settings['member_list'] as $members):?>
                            <div class="swiper-slide">
                                <div class="gesus-testimonial-content">
                                    <p><i class="fas fa-quote-left"></i><?php echo $members['member_info']; ?></p>
                                    <div class="author">
                                      
                                        <?php echo get_that_image($members['member_photo']); ?>    

                                        <div class="autor-title">
                                            <a href="team.html" class="title"><?php echo $members['member_name']; ?></a>
                                            <small><?php echo $members['member_desi']; ?></small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          <?php endforeach; endif; ?>
                        </div>
                        <div class="swiper-nav">
                            <div class="swiper-arrow" id="testimonial-prev"><i class="far fa-long-arrow-left"></i></div>
                            <div class="swiper-arrow" id="testimonial-next"><i class="far fa-long-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="thumb">
                        <?php echo get_that_image($settings['group_img']); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--  Testimonial end   -->