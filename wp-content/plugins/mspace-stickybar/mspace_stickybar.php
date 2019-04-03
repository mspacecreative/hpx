<?php
/*
 * Plugin Name: Sticky Link Bar
 * Plugin URI: http://mspacecreative.com
 * Description: Fixed 2 button navigation
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function stickyStyles() {
 	wp_enqueue_style( 'sticky-css', plugin_dir_url( __FILE__ ) . 'css/sticky.css', array(), null );
 }
 
 function stickyBar() {
 		ob_start(); ?>
 			<div class="sticky-bar">
 				<div class="sticky-bar-inner">
 					<div class="sticky-bar-inner-center clearfix">
 						<?php if( have_rows('button_1', 'options') ): ?>
 						<div class="sticky-bar-button first">
 							<?php while( have_rows('button_1', 'options') ): the_row();
 								$label = get_sub_field('button_label', 'options');
 								$link = get_sub_field('button_link', 'options'); ?>
 							<a href="<?php echo $link; ?>" target="_blank">
 								<?php echo $label; ?>
 							</a>
 							<?php endwhile; ?>
 						</div>
 						<?php endif; ?>
 						<?php if( have_rows('button_2', 'options') ): ?>
 						<div class="sticky-bar-button last">
 							<?php while( have_rows('button_2', 'options') ): the_row();
 								$label = get_sub_field('button_label_2', 'options');
 								$link = get_sub_field('button_link_2', 'options'); ?>
 							<a href="<?php echo $link; ?>" target="_blank">
 								<?php echo $label; ?>
 							</a>
 							<?php endwhile; ?>
 						</div>
 						<?php endif; ?>
 					</div>
 				</div>
 			</div>
 		<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_head', 'stickyBar' );
 add_action( 'wp_enqueue_scripts', 'stickyStyles' );