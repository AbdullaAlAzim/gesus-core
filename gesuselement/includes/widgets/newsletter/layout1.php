<?php 
    echo'<section class="gesus-subscribe-newsletter gesus-section">
        <div class="container">
            <div class="gesus-subscribe-newsletter-wrp home-two-news">
                <div class="gesus-section-title">
                    <p class="orange-color">// '.$settings['sub_title'].'</p>
                    <h2>'.$settings['title'].'</h2>   
                </div>
                <p>'.$settings['info'].'</p>
                 
               '.do_shortcode($settings['form']).'
                
            </div>
        </div>
    </section>';