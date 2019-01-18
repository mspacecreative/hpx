<?php 

$images = get_field('sponsor_logo_gallery');

if( $images ): ?>
    <ul class="sponsor-logos-list">
        <?php foreach( $images as $image ): ?>
            <li class="sponsor-logo">
                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>