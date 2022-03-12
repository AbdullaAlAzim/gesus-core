<?php

/*Meta Fields*/
function magnews_meta_fields(){
    return array(
        'tag' => esc_html__('Tag', 'magnews') ,
        'cat' => esc_html__('Category color', 'magnews') ,
        // 'cat_bg' => esc_html__('Category background color', 'magnews') ,
        'title' => esc_html__('Post title & permalink', 'magnews') ,
        'title_nolink' => esc_html__('Post title no permalink', 'magnews') ,
        'title_single' => esc_html__('Single post title', 'magnews') ,
        'time' => esc_html__('Date', 'magnews') ,
        'share' => esc_html__('Share button', 'magnews') ,
        //'reading' => esc_html__('Reading time', 'magnews') ,
        //'thumb' => esc_html__('Thumbnail', 'magnews') ,
        //'view' => esc_html__('Post views', 'magnews') ,
        'excerpt' => esc_html__('Excerpt', 'magnews') ,
        'space' => esc_html__('Space with separator', 'magnews') ,
        'clear' => esc_html__('Clear section', 'magnews') ,
        'h5' => esc_html__('Clear with 5px height', 'magnews') ,
        'h10' => esc_html__('Clear with 10px height', 'magnews') ,
        'w10' => esc_html__('Width 10px', 'magnews') ,
        'hr' => esc_html__('Horizontal line', 'magnews') ,
        'btn' => esc_html__('Readmore Button', 'magnews') ,
        //'pmeta-btm' => esc_html__('Bottom post meta', 'magnews') ,
        'author' => esc_html__('Author', 'magnews') ,
        //'author_img' => esc_html__('Author Image', 'magnews') ,
        'comment' => esc_html__('Comment No', 'magnews') ,
    );  
}

/*Meta Fields*/
function magnews_orderby_post(){
    return array(
        'none' => __('No order', 'gesuselement'),
        'ID' => __('Post ID', 'gesuselement'),
        'author' => __('Author', 'gesuselement'),
        'title' => __('Title', 'gesuselement'),
        'date' => __('Published date', 'gesuselement'),
        'modified' => __('Modified date', 'gesuselement'),
        'parent' => __('By parent', 'gesuselement'),
        'rand' => __('Random order', 'gesuselement'),
        'comment_count' => __('Comment count', 'gesuselement'),
        'menu_order' => __('Menu order', 'gesuselement'),
        'post__in' => __('By include order', 'gesuselement'),
    );  
}

//
/* First letter of Content */
/*function fashmag_first_letter() {
    $content = get_the_title();
    return mb_substr($content,0,1, "utf-8");
}
*/
 if ( ! function_exists( 'ae_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function ae_posted_on() {
    
    $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

    $time_string = sprintf( $time_string,
        esc_attr( get_the_date( 'c' ) ),
        esc_html( get_the_date() )
    );

    $posted_on = sprintf(
        _x( '%s', 'post date', 'typecast' ),
         $time_string
    );

    return '<span class="magnews-posted-on leffect-1"><i class="fas fa-calendar-alt"></i> '.$posted_on.'</span>';
}
endif;

function fashmag_social_post_share(){

    if( has_post_thumbnail() ){
        $share_image = wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
        $share_image= $share_image[0];
        $share_image_portrait= wp_get_attachment_image_src( get_post_thumbnail_id(), '' );
        $share_image_portrait= $share_image_portrait[0];
    }else{
        $share_image= '';
        $share_image_portrait= '';
    }
    $share_excerpt = strip_tags( get_the_excerpt(), '<b><i><strong><a>' );
    $html = '<ul>
        <li><a href="http://www.facebook.com/sharer.php?u='.rawurlencode( get_the_permalink() ).'" ><i class="fa fa-facebook"></i></a></li>
        <li><a href="http://twitter.com/intent/tweet?text='.rawurlencode( get_the_title() ) .'&amp;url='.rawurlencode( get_the_permalink() ).'"><i class="fa fa-twitter"></i></a></li>
        <li><a href="http://www.linkedin.com/shareArticle?mini=true&amp;url='.rawurlencode( get_the_permalink() ).'&amp;title='.rawurlencode( get_the_title() ).'&amp;summary='.rawurlencode ( $share_excerpt ).'&amp;source='.rawurlencode( get_bloginfo('name') ).'"><i class="fa fa-linkedin"></i></a></li>
        <li><a href="http://pinterest.com/pin/create/button/?url='.rawurlencode( get_the_permalink() ).'&amp;media='.rawurlencode( $share_image_portrait ).'&amp;description='.rawurlencode( get_the_title() ).'"><i class="fa fa-pinterest"></i></a></li>
        
    </ul>';
    return $html;
} 


function fashmag_comment(){ 
    if ( ! post_password_required() ) {
        
        $num_comments = get_comments_number(); // get_comments_number returns only a numeric value

        if ( comments_open() ) {
            if ( $num_comments == 0 ) {
                $comments = __('0 Comment', 'typecast');
            } elseif ( $num_comments > 1 ) {
                $comments = $num_comments . __('Comments', 'typecast');
            } else {
                $comments = __('1 Comment','typecast');
            }
            $write_comments = $comments;
            
        } else {
            $write_comments =  __('off', 'typecast');
        }
        return '<span class="post-comment leffect-1"><i class="far fa-comments"></i> '.$write_comments.'</span>';
    }   
}

function fashmag_author(){

        return'<span class="post-meta-author leffect-1">
            <span class="meta-author-name"><i class="far fa-user"></i> '.get_the_author_posts_link().'</span>
        </span>';
}

function fashmag_tags(){

    $post_tags = get_the_tags();
    $separator = ' , ';
    if (!empty($post_tags)) {
        foreach ($post_tags as $tag) {
            $output .= '<a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a>' . $separator;
        }
        return '<span class="nio-tag"><i class="fas fa-tags"></i>'.trim($output, $separator).'</span>';
    }
}

function fashmag_width_10(){

        return'<span class="width10"></span>';
}


function fashmag_post_title(){
        global $post;
        $id = $post->ID;
       // $fletter = fashmag_first_letter();
 
        return'<h3 class="entry_title"><a href="'.get_the_permalink($id).'">'.get_the_title($id).'</a></h3>';
}

function ae_readmore_btn(){
        global $post;
        $id = $post->ID;

        return'<div class="news_more float-right"><a class="btn-more" href="'.get_the_permalink($id).'">Read More</a></div>';
}

function madmag_ft_images($thumbnail){

    global $post;
    $id = $post->ID;    
    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($id),$thumbnail);
    if ( !$featured_image) {
       // return ;
    };
    $image_url =  $featured_image[0];   
    $featuredID = get_post_thumbnail_id();

    $alt = get_the_title($featuredID); 
    $attachment_data= wp_prepare_attachment_for_js($featuredID);
    $placeholder =  Gesus_PLUGIN_URL . 'assets/lazyload.svg';

    $out='<div class="ft-thumbwrap"><a href="'.get_the_permalink($id).'"><img class="featured-img lazyload" src= "'.$placeholder.'" width= "'.$attachment_data['width'].'" height="'.$attachment_data['height'].'" data-src="'.$image_url.'" alt="'.$alt.'"></a></div>';
   // ob_start();
    return $out;
   // return ob_get_clean();
}


function fashmag_post_title_nolink(){
        global $post;
        $id= $post->ID;
        //$fletter = fashmag_first_letter();
        return'<h3 class="post-title-builder">'.get_the_title($id).'</h3>';
}

function fashmag_background_cat(){

    if ( 'post' == get_post_type() ) {
        $categories = get_the_category();
        if($default==true){
            $separator = ' ';
        }else {
            $separator = ' ';              
        }
        
        $output = '';
        if($categories){
            foreach($categories as $category) {

                $output .= '<a class="bgcat-links" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;

            }
        $cat= trim($output, $separator);
        return '<span class="post-cat leffect-1">'.$cat.'</span>';
        }
    }


}

function ae_post_view(){
        global $post;
        $id= $post->ID;

        $view = get_post_meta( $id, 'post_view', true );
        $views = ( empty( $view ) ) ? 0 : $view;    
        

        $out='<span class="postview leffect-1"><span class="view-count">'.$views.' Views</span></span>';


    return $out;
}

/*Space*/

function ae_post_spacer(){
    $out='<hr class="hr-sep">';
    return $out;
}

/*Space*/

function fashmag_space_meta(){
    $out='<span class="meta-space leffect-1"></span>';
    return $out;
}

function ae_clearifix(){
    $out='<div class="meta-clearing"></div>';
    return $out;
}

function ae_clearifix_h5(){
    $out='<div class="meta-clearing height5"></div>';
    return $out;
}

function ae_clearifix_h10(){
    $out='<div class="meta-clearing height10"></div>';
    return $out;
}

/**
 * Display category background based on theme options 
 */
 
if ( ! function_exists( 'ae_single_category_bg' ) ) :

        function ae_single_category_bg($default = true) {
                            
            if ( 'download' == get_post_type() ) {
                $categories = get_the_category();
                $separator = ' '; 
                
                $output = '';
                if($categories){
                    foreach($categories as $category) {
                        //$term_data = get_term_meta( $category->term_id, '_custom_taxonomy_options', true );
                       // $style = $term_data ? 'style=background:'.$term_data["cat_color"].'' : '';
                        $output .= '<a class="cat-bg" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
                        //var_dump($term_data["cat_color"]);

                    }
                $cat= trim($output, $separator);
                return '<span class="catbg-wrap">'.$cat.'</span>';
                }
            }

}
endif;


/**
 * Estimate time required to read the article
 *
 * @return string
 */
function fashmag_reading_time() {

    $word_count = floor( str_word_count( get_the_content() ) / 120 );
    if ($word_count >= 1){

        $out = sprintf( _n( '%d min', '%d min', $word_count, 'typecast' ), $word_count );
        return '<span class="reading-time leffect-1">'.$out.' Read</span>';

    }
    

}

/**
 * Display category based on theme options 
 */
 
if ( ! function_exists( 'ae_single_category' ) ) :

        function ae_single_category($default = true) {

            if ( 'post' == get_post_type() ) {
                $categories = get_the_category();
                if($default==true){
                    $separator = ' ';
                }else {
                    $separator = ' ,';              
                }
                
                $output = '';
                if($categories){
                    foreach($categories as $category) {

                        $output .= '<a class="d-inline-block" href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;

                    }
                $cat= trim($output, $separator);
                return $cat;
                }
            }

}
endif;

if ( ! function_exists( 'ae_post_tag' ) ) :

/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function ae_post_tag() {
    
    if ( 'post' == get_post_type() ) {
        
    $posttags = get_the_tags();
    $separator = '';
    $output = '';
    if ($posttags) {

        foreach($posttags as $tag) {
            //$output .='<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a><li>'.$separator; 
            $output .='<li><a href="' . get_tag_link($tag->term_id) . '">' . $tag->name . '</a><li>'; 
        }

        //$tags= trim($output, $separator);
        return '<ul>'.$output.'</ul>';
    }
    }
}
endif;

function post_category_id($taxonomy){
    global $post;
    $terms = get_the_terms($post->ID, $taxonomy);
    foreach ($terms as $term) {
        return $term->term_id;
    }
}
//Custom excerpt 

function fashmag_excerpt_shortcode($limit) {
    if($limit > "0"){
    global $post;
    $id = $post->ID;
    $outpu = wp_trim_words(get_the_content(), $limit,'');
    
        return '<div class="entry_excerpt">'.$outpu.'</div>';
    
    }
    
}

function fashmag_excerpt_folio($limit) {
    if($limit > "0"){
    global $post;
    $id = $post->ID;

    if ( has_excerpt( $id ) ) {
        $string = get_the_excerpt();
    } else {
        $string = get_the_content();
    }

    $excerpt = strip_tags($string);
    $excerpt = substr($excerpt, 0, $limit);
    $outpu = $excerpt;
    
        return '<p class="post-entry">'.$outpu.'</p>';
    
    }
    
}

/**
 * Display post tag,category,date,author 
 */


function ae_build_postmeta($metas = '',$excerpt_length = '',$readmore='',$firsthumb=''){


        if ( !is_array($metas) ) {
            $metas = explode(',' , $metas); 
        }

        //var_dump($excerpt_length);
        if ( is_array($metas) ) {
                 $outz='';
            foreach( $metas as $meta ) {

                    $out = '';

                    switch ( $meta ) {

                    case 'tag':
                        $out = ae_post_tag() ;
                        break;

                    case 'cat':
                        $out = ae_single_category(false);
                        break;

                    case 'cat_bg':
                        $out = ae_single_category_bg(false);
                        break;

                    case 'time':
                        $out = ae_posted_on() ;
                        break;  

                    case 'view':
                        $out = ae_post_view() ; 
                        break;  

                    case 'title':
                        $out = fashmag_post_title() ;
                        break;

                    case 'hr':
                        $out = ae_post_spacer() ;
                        break;

                    case 'clear':
                        $out = ae_clearifix() ;
                        break;

                    case 'h5':
                        $out = ae_clearifix_h5() ;
                        break;

                    case 'h10':
                        $out = ae_clearifix_h10() ;
                        break;


                    case 'btn':
                        $out = ae_readmore_btn($readmore) ;
                        break;

                    case 'thumb':
                        $out = madmag_ft_images($firsthumb) ;
                        break;

                    case 'reading':
                        $out = fashmag_reading_time() ;
                        break;  

                    case 'share':
                        $out = magnews_share_post() ;
                        break;

                    case 'space':
                        $out = fashmag_space_meta() ;
                        break;

                    case 'view':
                        $out = fashmag_post_title() ;
                        break;

                    case 'title_nolink':
                        $out = fashmag_post_title_nolink() ;
                        break;  

                    case 'author':
                        $out = fashmag_author();
                        break;

                    case 'w10':
                        $out = fashmag_width_10();
                        break;

                    case 'comment':
                        $out = fashmag_comment() ;
                        break;

                    case 'excerpt':
                        $out = fashmag_excerpt_shortcode($excerpt_length);
                        break;

                    }

                if ( !empty( $meta ) ) {
                    $outz .= $out;
                }       

                }   
            echo '<div class="meta-wrap">'.$outz.'</div>';  

            }   

}

function ae_drop_cat($tax) {
        $args = [
            'taxonomy' => $tax,
            'hide_empty' => false,
            'hierarchical' => true,
            'orderby'       => 'name',
            'order'         => 'DESC',
        ];
        $categories_obj = get_categories($args);
        $categories = array();

        foreach ($categories_obj as $pn_cat) {
            $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
        }
        return $categories;         
}
function ae_single_category($default = true) {
    if ( 'post' == get_post_type() ) {
        $categories = get_the_category();
        $separator = ',';
        $output = '';
        if($categories){
            foreach($categories as $category) {
                $output .= '<a href="'.get_category_link( $category->term_id ).'">'.$category->cat_name.'</a>'.$separator;
            }
            $cat= trim($output, $separator);
            return $cat;
        }
    }
}
function gesus_get_category_link($taxonomy){

    global $post;
    $output='';
    $ids=  $taxonomy;
    $terms = wp_get_post_terms($post->ID, $ids);
    $separator = ', ';
    if($terms){
        foreach($terms as $term) {
            $term_link = get_term_link($term);
            $output .='<a href="' . esc_url($term_link) . '">'.$term->name.'</a>'.$separator;
        }
    }
    return trim($output, $separator);
}

function ae_drop_posts($post_type){
    $args = array(
      'numberposts' => -1,
      'post_type'   => $post_type
    );

    $posts = get_posts( $args );        
    $list = array();
    foreach ($posts as $cpost){
    //  print_r($cform);
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}

function ae_folio_cat(){

        global $post;
        $output='';        
        $ids=  'portfolio-category';                   
        $terms = wp_get_post_terms($post->ID, $ids);        
        $separator = ', ';
        if($terms){
            foreach($terms as $term) {
                $term_link = get_term_link($term);
                $tax_id = get_term( $term->term_id, 'portfolio-category' );
                //$count = $tax_id->count;
                $output .='<a class="gallery-cat" href="' . esc_url($term_link) . '">'.$term->name.'</a>'.$separator;
            }   
            echo trim($output, $separator);
        }       
}



function misha_loadmore_ajax_handler(){
     
    $per_page = $_POST['posts'];
    $cat = explode(',' , $_POST['cat']);
    $col_num = $_POST['column'];
    $column = fw_grid_col( $col_num );

    $meta_f = $_POST['metaf'];
    $meta_r = $_POST['metar'];
    $excerptf = $_POST['excerptf'];
    $excerptr = $_POST['excerptr'];
    $thumbf = $_POST['thumbf'];
    $thumbr = $_POST['thumbr'];
    $heading = $_POST['rhead'];
    
    $template = $_POST['template'];
    $dir = $_POST['dir'];
    if ($dir=='prev'){
        $paged = $_POST['page'] - 1;
    } else {
        $paged = $_POST['page'] + 1;
    }

    //var_dump($col_num);
    $query_args = array(
        'post_type' => 'post',
        'paged' => $paged,
        'posts_per_page' => $per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'category',
                'field' => 'term_id',
                'terms' => $cat,
            ) ,
        ) ,
    );
    
    $the_query = new WP_Query( $query_args );
    require Gesus_PLUGIN_DIR.'includes/loops/'. $template .'.php';
    die(); 
}
 
 
 
add_action('wp_ajax_loadmore', 'misha_loadmore_ajax_handler'); 
add_action('wp_ajax_nopriv_loadmore', 'misha_loadmore_ajax_handler'); 


function misha_tabcat_ajax_handler(){
     
    $per_page = $_POST['posts'];
    $cat = explode(',' , $_POST['catid']);
    $metaf = $_POST['metaf'];
    $class = $_POST['column'];
    $excerptf = $_POST['excerptf'];
    $template = $_POST['template'];
    $thumb = $_POST['thumb'];
    $page = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $query_args = array(
        'post_type' => 'portfolio',
        'paged' => $paged,
        'posts_per_page' => $per_page,
        'tax_query' => array(
            array(
                'taxonomy' => 'portfolio-category',
                'field' => 'term_id',
                'terms' => $cat,
            ) ,
        ) ,
    );

    $the_query = new WP_Query( $query_args );
    $max =  $the_query->max_num_pages;
    $current =  $the_query->paged;
    //var_dump($thumb);
    echo '<span class="xyz" data-max="'.$max.'" ></span>';
    //require(Gesus_PLUGIN_DIR.'includes/loops/tabcat.php');
    require Gesus_PLUGIN_DIR.'includes/loops/'. $template .'.php';
    die(); 
}
 
 
 
add_action('wp_ajax_tabcat', 'misha_tabcat_ajax_handler'); 
add_action('wp_ajax_nopriv_tabcat', 'misha_tabcat_ajax_handler'); 


function madmag_bg_images($thumbnail){

    global $post;
    $post_id = $post->ID;   
    $featured_image = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID),$thumbnail);
    if ( !$featured_image) {
        return ;
    };  
    $image_url =  $featured_image[0];
    $lazy='data-bg='.$image_url.'';

    $bg_image = 'background-image:url('.$image_url.');';    
    $out = ($bg_image) ? 'style='.$bg_image.'' : '';    

    return esc_attr($out);
    
}

 
function pagination_bar( $custom_query='' ) {
    if ($custom_query){
        $q = $custom_query;
    } else {
        global $wp_query;
        $q = $wp_query;
    }
    
    $total_pages = $q->max_num_pages;
    $big = 999999999; // need an unlikely integer

    if ($total_pages > 1){
        $current_page = max(1, get_query_var('paged'));
        echo '<div class="wrap-pagi">';
        echo paginate_links(array(
            'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
            'format' => '?paged=%#%',
            'current' => $current_page,
            'total' => $total_pages,
            'type' => 'list',
            'prev_text' => '<i class="fa fa-angle-left"></i>',
            'next_text' => '<i class="fa fa-angle-right"></i>',            
        ));
        echo '</div>';
    }
}