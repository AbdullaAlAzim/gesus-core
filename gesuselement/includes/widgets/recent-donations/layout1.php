<?php
if ($wp_query->have_posts()) :
    while ($wp_query->have_posts()) :
        $wp_query->the_post();
        $id = get_the_ID();
        // Output the content
        $content_option = get_post_meta($id, '_give_content_option', true);
        if ($content_option != 'none') {
            $content = get_post_meta($id, '_give_form_content', true);
        }
        $checkout_label = get_post_meta($id, '_give_checkout_label', true);
        $goal_progress = get_post_meta($id, '_give_form_goal_progress', true);
        $goal_set = get_post_meta($id, '_give_set_goal', true);
        $goal = substr($goal_set, 0, strpos($goal_set, "."));
        $goal_earning = get_post_meta($id, '_give_form_earnings', true);
        $earning = substr($goal_earning, 0, strpos($goal_earning, "."));
        $status = get_post_meta($id, '_give_form_status', true);
        $meta = get_post_meta($id);
        //var_dump($meta);
        ?>
        <div class="card gesus-featured-card mt-0">
            <div class="gesus-card-thumb">
                <a href="<?php the_permalink(); ?>">
                    <?php give_get_template_part('single-give-form/featured-image'); ?>
                </a>
                <span class="gesus-categories-btn"><?php echo wp_kses_post($status); ?></span>
                <a href="<?php echo get_author_posts_url(get_the_author_meta('ID'));?>" class="author">
                    <?php echo get_avatar(get_the_author_meta('ID')) ?>
                    <?php echo esc_html('By');?> <?php echo get_the_author(); ?>
                </a>
            </div>
            <div class="card-body">
                <a href="<?php the_permalink(); ?>" class="card-title">
                    <h4>
                        <?php the_title(); ?>
                    </h4>
                </a>
                <div class="gesus-progressbar">
                    <div class="ab-progress" data-progress data-tooltip="true"
                         data-value="<?php echo wp_kses_post($goal_progress); ?>"></div>
                </div>
                <p><span><?php echo wp_kses_post(give_currency_symbol().$goal_earning);?></span> <?php echo esc_html('donated of');?>
                    <span><?php echo wp_kses_post(give_currency_symbol().$goal);?></span> <?php echo esc_html('goal');?></p>
                <div class="gesus-card-link">
                    <a class="btn gesus-btn"
                       href="<?php the_permalink(); ?>"><?php echo wp_kses_post($checkout_label); ?></a>
                    <div class="gesus-action">
                        <a href="<?php echo esc_url('https://www.facebook.com/sharer/sharer.php?u='.get_the_permalink().'');?>"><i class="fab fa-facebook-f"></i></a>
                        <a href="<?php echo esc_url('https://twitter.com/intent/tweet?url='.get_the_permalink().'&text='.get_the_title().'&via='.get_the_author_meta('twitter').'');?>"><i class="fab fa-twitter"></i></a>
                        <a href="<?php echo esc_url('https://api.whatsapp.com/send?text='.get_the_title().': '.get_the_permalink().'');?>"><i class="fab fa-whatsapp"></i></a>
                    </div>
                </div>
            </div>
        </div>
    <?php

    endwhile;

endif;
?>