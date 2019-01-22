<div class="clearfix">
	<?php
	    $loop = new WP_Query( array(
	    	'tax_query' =>  array (
	    	  array(
	    	    'taxonomy' => 'marcato_genre', // My Custom Taxonomy
	    	    'terms' => 'comedy', // My Taxonomy Term that I wanted to exclude
	    	    'field' => 'slug', // Whether I am passing term Slug or term ID
	    	    'operator' => 'NOT IN', // Selection operator - use IN to include, NOT IN to exclude
	    	  ),
	    	 ),
	        'post_type' => 'marcato_artist', 
	        'orderby'=> 'title', 
	        'order' => 'ASC', 
	        'posts_per_page' => -1 
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
</div>