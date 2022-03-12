<?php

// The Loop
if ( $the_query->have_posts() ) {
	$post_count = 0;
	while ( $the_query->have_posts() ) {
		$the_query->the_post();	
		$post_count++;
		?>  

      <div class="single-filter-item anim-fade <?php echo $class; ?>">
            <div class="single-project-style-one">
                <div class="img-box"> 
                    <?php if ( has_post_thumbnail() ) : ?> 
                        <?php the_post_thumbnail($img_size); ?>
                    <?php endif; ?>
                    <div class="overlay">
                        <div class="box">
                            <div class="content">
                                <a href="<?php the_permalink(); ?>" class="more-btn fa fa-link"></a>
                                <h3 class="title"><?php the_title(); ?></h3>
                            </div><!-- /.content -->
                        </div><!-- /.box -->
                    </div><!-- /.overlay -->
                </div><!-- /.img-box -->
            </div><!-- /.single-project-style-one -->
      </div>

	 <?php } wp_reset_postdata(); } else {
	//echo 'No Loadmore';
}