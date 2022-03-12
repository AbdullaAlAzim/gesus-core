<?php 

class gesus_plugins_hooks {

    function __construct() {
        add_action('upload_mimes',array(&$this,'gesus_mime_type'));
        add_action('wp_enqueue_scripts',array(&$this,'gesus_bar_plugin_scripts'));
        add_action('wp_body_open',array(&$this,'render_preloader'));
        add_action('wp_body_open',array(&$this,'render_scroll_top'));
        add_action('gesus_single_navigation',array(&$this,'single_nav'));
        add_action('gesus_pagination',array(&$this,'gesus_posts_pagination'));
        add_action('gesus_related_post',array(&$this,'gesus_related_post'));
        add_action('gesus_authorbox',array(&$this,'gesus_authorbox'));
        add_action('gesus_share_tags',array(&$this,'gesus_share_tag'));
 
        add_action('gesus_header',array(&$this,'gesus_render_header'));
        add_action('gesus_footer',array(&$this,'gesus_render_footer'));
        add_action('gesus_sidebar',array(&$this,'gesus_render_sidebar'));
        add_action('gesus_sidebar_shop',array(&$this,'gesus_render_sidebar_shop'));
        add_action('gesus_footer_widget',array(&$this,'gesus_render_footer_widget'));

    }

      function render_preloader(){
        if (gesus_options('enb_pre') == '1') {
            echo '<div class="preloader" data-background="'.get_template_directory_uri().'/assets/images/preloader.gif"></div>';
        }
        
    }
    function render_scroll_top(){
         if (gesus_options('enb_scroll') == '1') {
            echo '<button class="scroll-top">
        <i class="far fa-angle-double-up"></i>
    </button> ';
}
    }

    function gesus_render_sidebar(){

        $cust_header = gesus_options('sidebar');
        echo do_shortcode('[INSERT_ELEMENTOR id="'.$cust_header.'"]');
        
    }

    function gesus_render_sidebar_shop(){

        $cust_header = gesus_options('sidebar_shop');
        echo do_shortcode('[INSERT_ELEMENTOR id="'.$cust_header.'"]');

    }

    function gesus_render_footer_widget(){

        $cust_header = gesus_options('footer_widget');
        echo do_shortcode('[INSERT_ELEMENTOR id="'.$cust_header.'"]');

    }
 
    function gesus_render_footer(){

        $meta_switch = gesus_meta('footer_switch');
        $meta_footer = gesus_meta('meta_footer');
        if ($meta_switch == '1') {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $meta_footer . '"]');
        }
    }

    function gesus_render_header(){
        $meta_switch = gesus_meta('header_switch');
        $meta_header = gesus_meta('meta_header');
        if ($meta_switch == '1') {
            echo do_shortcode('[INSERT_ELEMENTOR id="' . $meta_header . '"]');
        }
    }

    function gesus_share_tag(){

        $tagtitle = gesus_options('tag_title');
        $sharetitle = gesus_options('share_title');

        $post_tags = get_the_tags();
        $separator = ' ';
        if (!empty($post_tags)) {
            foreach ($post_tags as $tag) {
                $output .= '<a href="'. get_tag_link($tag->term_id).'">' . $tag->name . '</a>' . $separator;
            }
            $tags = '<li>'.trim($output, $separator).'</li>';
            $out = '
                <h3>'.$sharetitle.'</h3>
                <ul>'.$tags.'</ul>
            ';
        }
    ?>    

        <div class="share_tag"> 
            <div class="gesus_tag float-left text-left ul-li">
                <?php echo $out;?>
            </div>
            <div class="share_post float-right text-right ul-li">
                <h3><?php echo $tagtitle;?></h3>
                <?php echo fashmag_social_post_share();?>
            </div>
        </div>

    <?php }

    function gesus_authorbox(){
 
        $authorid = get_the_author_meta('ID');
        $user_meta = get_user_meta( $authorid, '_yl_pfile', true );
        $title = gesus_options('auth_title');
        if (isset($user_meta["avatar"]["id"])){
            $img = wp_get_attachment_image($user_meta["avatar"]["id"],'full');
        }

    ?>

        <div class="postby_author">
            <div class="author_img">
                <?php echo $img;?>
            </div>
            <span><?php echo $title;?></span>
            <h3><a href="<?php echo get_author_posts_url( get_the_author_meta('ID')); ?>"><?php echo get_the_author_meta( 'display_name', $authorid ); ?></a></h3>
            <p><?php echo get_the_author_meta( 'description', $authorid ); ?></p>
        </div>

    <?php }

    function gesus_related_post(){
        $title = gesus_options('related_title');
        $id = $GLOBALS['post']->ID;
        $postcat = wp_get_post_categories( $id );
        $all_cat = implode(',' , $postcat);
        $args = array(  
            'posts_per_page' => 2,
            'post__not_in' => array($pid),
        ); 
        $args['cat'] = $all_cat;
        $wp_query = new WP_Query($args);

    ?>

        <div class="related_postview">
            <h3><?php echo $title;?></h3>
            <?php
                if ( $wp_query->have_posts() ) {
                    echo '<div class="row">';
                    while ($wp_query->have_posts()) : $wp_query->the_post();?>

                        <div class="col-md-6">
                            <div class="related_postitem">
                                <div class="postitem_img">
                                    <?php the_post_thumbnail(); ?> 
                                </div>
                                <div class="postitem_text">
                                    <span class="blog-meta"><i class="fas fa-calendar-alt"></i> <?php echo get_the_date(); ?></span>
                                    <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                    <p><?php echo ap_limited_excerpt(10);?></p>
                                </div>
                            </div>
                        </div>
 
                   <?php endwhile; wp_reset_postdata();echo '</div>';    
                }
            ?>
        </div>

    <?php }

    function gesus_posts_pagination(){

        global $wp_query;
        $big = 999999999; 
        $pages = paginate_links( array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var('paged') ),
                'total' => $wp_query->max_num_pages,
                'prev_next' => false,
                'type'  => 'array',
                'prev_next'   => TRUE,
                'prev_text' => '<i class="fas fa-angle-double-left"></i>',
                'next_text' => '<i class="fas fa-angle-double-right"></i>',
            ) );
            if( is_array( $pages ) ) {
                $paged = ( get_query_var('paged') == 0 ) ? 1 : get_query_var('paged');
                echo '<div class="blog_pagination text-center"><ul class="pagination">';
                foreach ( $pages as $page ) {
                        echo "<li>$page</li>";
                }
               echo '</ul></div>';
            }

    }

    function single_nav(){

        $post_id = $GLOBALS['post']->ID;
        $pid = get_previous_post_id($post_id);
        $nid = get_next_post_id($post_id);
        $plink = get_permalink($pid);
        $nlink= get_permalink($nid);

    ?>

        <div class="next_prev_post relative-position  clearfix">

            <?php if(!empty($pid)){ ?>
                <div class="nio_prev_post text-left float-left headline">
                        <a href="<?php echo $plink;?>">
                            <span class="nio-prev-lbl">Prev Post</span>
                            <h3><?php echo limit_title_length_thm(get_the_title($pid),20); ?></h3>
                        </a>
                </div>
            <?php } ?>

            <?php if(!empty($nid)){ ?>
                <div class="nio_prev_post text-right float-right headline">
                    <a href="<?php echo $plink;?>">
                        <span class="nio-prev-lbl">Next Post</span>
                        <h3><?php echo limit_title_length_thm(get_the_title($nid),20); ?></h3>
                    </a>
                </div>
            <?php } ?>

            <div class="bar_point text-center">
                <i class="fas fa-th"></i>
            </div>
        </div>

    <?php }

    function gesus_bar_plugin_scripts() {
            ob_start();
            include GESUS_PLUG_DIR . '/vendor/frontend/css.php';
            $output = ob_get_contents();
            ob_end_clean();
            return $output;
    }

    function gesus_mime_type($mimes) {
      $mimes['svg'] = 'image/svg+xml';
      return $mimes;
    }

    function back_to_top() {
        $show = '';
        if($show){
            echo '<a href="#" class="scrollToTop"><i class="fa fa-angle-up" aria-hidden="true"></i></a>';        
        }
    }                                  
    
}

new gesus_plugins_hooks();

function get_previous_post_id( $post_id ) {

    global $post;
    $oldGlobal = $post;
    $post = get_post( $post_id );
    $previous_post = get_previous_post();
    $post = $oldGlobal;
    if ( '' == $previous_post )
        return false;
    return $previous_post->ID;
}

function get_next_post_id( $post_id ) {

    global $post;
    $oldGlobal = $post;
    $post = get_post( $post_id );
    $next_post = get_next_post();
    $post = $oldGlobal;
    if ( '' == $next_post )
        return false;
    return $next_post->ID;
}

function limit_title_length_thm($title,$words){
    if( $words > 10 ){
        return mb_strimwidth($title, 0, $words, '..');
    } else {
        return $title;
    }
}
