<?php
/*
 * Plugin Name: HPX MailChimp Popup List Builder
 * Plugin URI: https://halifaxpopexplosion.com
 * Description: Shows enews sign-up upon landing on site
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: https://mspacecreative.com
 */
 
 function popupStyles() {
 	wp_enqueue_style( 'popup-css', plugin_dir_url( __FILE__ ) . 'css/popup.css', array(), null );
 	wp_enqueue_script( 'popup-script', plugin_dir_url( __FILE__ ) . 'js/popup.js', array( 'jquery' ), null, true );
 }
 
 if( function_exists('acf_add_options_sub_page') ) {
 	acf_add_options_sub_page('MailChimp');
 }
 
 function popupWindow() {
 	ob_start(); ?>
 		
 		<div class="cookies-mc">
 			<div class="mc-popup-form-bg">
 				<div class="mc-popup-form mailchimp-container">
 					<i class="fa fa-close"></i>
 					
 					<?php if ( get_field('insider_title', 'options') ): ?>
					<h3><?php the_field('insider_title', 'options') ?></h3>
					<?php endif; ?>
					
					<?php if ( get_field('insider_content', 'options') ): ?>
 					<p><?php the_field('insider_content', 'options') ?></p>
 					<?php endif; ?>
 					
 					<?php echo do_shortcode('[mailchimp_form]'); ?>
 					
 				</div>
 			</div>
 		</div>
 		
 	<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_footer', 'popupWindow' );
 add_action( 'wp_enqueue_scripts', 'popupStyles' );