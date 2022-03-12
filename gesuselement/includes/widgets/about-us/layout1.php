 <!-- about section start  -->
 <?php
    echo'<section class="gesus-about-section gesus-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-thumb-wrapper">
                        '.get_that_image($settings['image2'],'shape-one').'
                        '.get_that_image($settings['image3'],'shape-two').'
                        '.get_that_image($settings['image4'], 'shape-three').'
                        '.get_that_image($settings['image5'], 'shape-four').'
                
                        <div class="thumb-one">
                            '.get_that_image($settings['image']).'
                        </div>
                        <div class="thumb-two">
                            '.get_that_image($settings['image1']).'
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="gesus-about-content-wrapper">
                        <div class="gesus-section-title">
                            <p>'.$settings['title_sec'].'</p>
                            <h2>'.$settings['title'].'</h2>
                        </div>
                        <div class="about-content">
                            '.$settings['info'].'
                            <ul>';
                         if ($settings['hero_list']) {
                             foreach ($settings['hero_list'] as $hero) {
                                 echo '<li><i class="far fa-check"></i>'.$hero['aboutt_title'].'</li>';
                             }
                         }
                         echo '</ul>
                            <a '.get_that_link($settings['link']).' class="btn gesus-btn black-btn">'.$settings['button'].'</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>';
   