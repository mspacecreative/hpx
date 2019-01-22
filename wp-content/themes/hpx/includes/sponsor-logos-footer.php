<?php 

$images = get_field('footer_logo_gallery', 'options');

if( $images ): ?>
    <ul class="sponsor-logos-list" style="font-size: 0;">
        <?php foreach( $images as $image ): ?>
            <li class="sponsor-logo">
                <img src="<?php echo $image['sizes']['thumbnail']; ?>" alt="<?php echo $image['alt']; ?>" />
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>