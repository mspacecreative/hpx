<div class="clearfix">
	
	<?php $args = array(
		'post_type' => 'marcato_artist',
		'tax_query' => array(
			array(
				'taxonomy' => 'marcato_genre',
				'field'    => 'slug',
				'terms'    => 'comedy',
			),
		),
	);
	
	$loop = new WP_Query( $args ); 
	
	if ( $loop->have_posts() ) : while ( $loop->have_posts() ) : $loop->the_post();
		if ( has_post_thumbnail() ) { ?>
		<div class="artist-thumb">
			<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'headshot' ); ?>
				<p class="artist-name">
					<?php the_title(); ?>
				</p>
			</a>
		</div>
		 <?php }
		 ?>
	<?php endwhile; else: ?>
		<p><?php _e('There are no comedians listed yet!'); ?></p>
	<?php endif; ?>
	
</div>