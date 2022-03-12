 <!--  Testimonial start   -->
<?php
    echo'<section class="gesus-testimonial-section gesus-section">
           '.get_that_image($settings['shape_one'], 'animatin animation-one').'
        '.get_that_image($settings['shape_two'], 'animatin animation-two').'
        '.get_that_image($settings['shape_three'], 'animatin animation-three').'
        '.get_that_image($settings['shape_four'], 'animatin animation-four').'
       
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="testimonial-thumb">
                         '.get_that_image($settings['left_shape_one'], 'shape1').'
                      
                         '.get_that_image($settings['left_shape_two'], 'shape2').'
               
                           '.get_that_image($settings['left_shape_three'], 'shape3').'
                          '.get_that_image($settings['left_img'], 'thumb').'
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gesus-section-title">
                        <p>'. $settings['sub_titlez'] .'</p>
                        <h2>'. $settings['titlez'] .'</h2>
                    </div>
                    <div class="testimonial-slide-wrapper swiper-container">
                        <div class="swiper-wrapper">';

            if ($settings['member_list']) {
            foreach ($settings['member_list'] as $members) {        
                            echo'<div class="swiper-slide">
                                <div class="gesus-testimonial-content">
                                    <p><i class="fas fa-quote-left"></i> ' . $members['member_info'] . ' <i class="fas fa-quote-right"></i></p>
                                    <div class="author">
                                        ' . get_that_image($members['member_photo']) . '
                                        <div class="autor-title">
                                            <a href="team.html" class="title">' . $members['member_name'] . '</a>
                                            <small>' . $members['member_desi'] . '</small>
                                        </div>
                                    </div>
                                </div>
                            </div>';

                             }
                    }

                        echo '</div>
                        <div class="swiper-nav">
                            <div class="swiper-arrow" id="testimonial-prev"><i class="far fa-long-arrow-left"></i></div>
                            <div class="swiper-arrow" id="testimonial-next"><i class="far fa-long-arrow-right"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';





    