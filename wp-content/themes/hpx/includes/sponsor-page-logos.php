<?php

if( have_rows('champion_sponsors') ):

 	while ( have_rows('champion_sponsors') ) : the_row(); ?>

        <div class="sponsor-category-container">
			<h3 style="text-align: center;">
				<?php the_sub_field('sponsor_category'); ?>
			</h3>
			
			<?php 
			$images = get_sub_field('logo_gallery');
			$size = 'medium';
			
			if( $images ): ?>
			    <ul class="sponsor-logos-list">
			        <?php foreach( $images as $image ): ?>
			            <li class="sponsor-logo">
							<?php 
							$squarelogo = get_field('square_logo', $image['ID']); 
							if ( $squarelogo ):
			                echo wp_get_attachment_image( $image['ID'], $size, "", ["class" => "square-logo"] ); 
			                else : ?>
			                <?php echo wp_get_attachment_image( $image['ID'], $size ); ?>
			                <?php endif; ?>
			            </li>
			        <?php endforeach; ?>
			    </ul>
			<?php endif; ?>
		</div>

    <?php endwhile; else : endif;

?>