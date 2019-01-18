<?php
    $loop = new WP_Query( array(
        'post_type' => 'marcato_artist', 
        'orderby'=> 'title', 
        'order' => 'ASC', 
        'posts_per_page' => 24 
      )
    );
    while ( $loop->have_posts() ) : $loop->the_post();
        if ( has_post_thumbnail() ) { ?>
        <div class="artist-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'headshot' ); ?>
				<p class="artist-name">
					<?php the_title(); ?>
				</p>
			</a>
        </div>
         <?php } ?>
    <?php endwhile; wp_reset_query();
?>