  <!--  footer section start   -->
<div class="footer-bottom">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="footer-logo" title="<?php esc_attr_e( 'Home', 'gesus' ); ?>" rel="home">
                    <?php
                        echo $url;
                    ?>
                  </a>
            </div>
            <div class="col-lg-6">
            <?php echo ($settings['footer_top_one']);?>
            </div>
            <div class="col-lg-3">
                <ul class="gesus-social-link">
                      <?php  foreach ($settings['member_list'] as $member): ?>
                    <li><a <?php echo get_that_link($member['url1']); ?>><?php  \Elementor\Icons_Manager::render_icon( $member['icon1']); ?></a></li>
                                 
                    <?php endforeach; ?>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
<!--  footer section end   -->