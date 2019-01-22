<?php

if( have_rows('champion_sponsors') ):

 	while ( have_rows('champion_sponsors') ) : the_row(); ?>

        <div class="sponsor-category-container">
			<h3 style="text-align: center;">
				<?php the_sub_field('sponsor_category'); ?>
			</h3>
			
			<?php $images = get_sub_field('logo_gallery');
			
			if( $images ): ?>
			    <ul class="sponsor-logos-list">
			        <?php foreach( $images as $image ): ?>
			            <li class="sponsor-logo">
			                <img src="<?php echo $image['sizes']['medium']; ?>" alt="<?php echo $image['alt']; ?>" />
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
		</div>

    <?php endwhile; else : endif;

?>