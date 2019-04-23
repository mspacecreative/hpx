<?php 

$images = get_field('sponsor_logo_gallery');
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