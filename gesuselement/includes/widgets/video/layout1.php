<?php
    echo'<section class="gesus-wath-video-section gesus-section gesus-data-background" data-background="'.$settings['image']['url'].'">
        <div class="container">
            <div class="gesus-broadcast-content gesus-data-background" data-background="'.$settings['bg_image']['url'].'">
                <a  class="gesus-play-btn" href="' . $settings['vid_link']['url'] . '" data-lity><i class="fal fa-play"></i></a>
                <div class="gesus-section-title">
                    <p>'.$settings['sub_title'].'</p>
                    <h2>'.$settings['title'].'</h2>
                </div>
                <p class="vid-one">'.$settings['vid_details'].'</p>
            </div>
        </div>
    </section>';
