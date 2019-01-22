<ul class="et-social-icons">
	
	<?php if( get_field('facebook_link', 'options') ): ?>
	<li><a href="<?php the_field('facebook_link', 'options') ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
	<?php endif; ?>
	
	<?php if( get_field('twitter_link', 'options') ): ?>
	<li><a href="<?php the_field('twitter_link', 'options') ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
	<?php endif; ?>
	
	<?php if( get_field('instagram_link', 'options') ): ?>
	<li><a href="<?php the_field('instagram_link', 'options') ?>" target="_blank"><i class="fa fa-instagram"></i></a></li>
	<?php endif; ?>
	
	<?php if( get_field('spotify_link', 'options') ): ?>
	<li><a href="<?php the_field('spotify_link', 'options') ?>" target="_blank"><i class="fa fa-spotify"></i></a></li>
	<?php endif; ?>

</ul>