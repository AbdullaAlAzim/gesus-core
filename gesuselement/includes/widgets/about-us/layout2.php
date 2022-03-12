   <!-- about section start  -->
    <?php
    echo'<section class="gesus-about-church-section gesus-section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="gesus-about-church-thumb">
                        <span class="shape-two"></span>
                        <span class="shape-three"></span>
                        <span class="shape-four"></span>
                        '.get_that_image($settings['image22'],'shape-one').'
                           '.get_that_image($settings['image223'],'shape-bg').'
                        <div class="thumb">
                        '.get_that_image($settings['image007'],'thumb').'
                        </div>
                        <div class="gesus-video-play">
                          '.get_that_image($settings['image008']).'
                            <a href="'.$settings['video_link']['url'].'" class="gesus-play-btn orange" data-lity><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gesus-about-church-content">
                        <div class="gesus-section-title">
                            <p class="orange-color">// '.$settings['title_sec'].'</p>
                            <h2>'.$settings['title'].'</h2>
                        </div>
                        <div class="about-content">
                            <p>25+Contrary to popular belief, Lorem Ipsum is not simply random text roots in a piece of classical Latin literature from 45 BC</p>
                            <ul>';
                              if ($settings['hero_list']) {
                             foreach ($settings['hero_list'] as $hero) {
                                echo '<li><span><i class="far fa-check"></i></span> '.$hero['aboutt_title'].' </li>';
                                
                               
                             }
                         }
                         echo'</ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>'; 
