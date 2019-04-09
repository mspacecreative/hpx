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
 
 function popupWindow() {
 	ob_start(); ?>
 		
 		<div class="cookies-mc">
 			<div class="mc-popup-form-bg">
 				<div class="mc-popup-form mailchimp-container">
 					<i class="fa fa-close"></i>
 					<h3>HPX Insiders</h3>
 					<p>Sign up for our e-newsletter and receive exclusive deals, first looks, and more!</p>
 						<?php echo do_shortcode('[mailchimp_form]'); ?>
 				</div>
 			</div>
 		</div>
 		
 	<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_footer', 'popupWindow', 200 );
 add_action( 'wp_enqueue_scripts', 'popupStyles' );
 
	/*if ( get_field('mc_popup_form', 'options') ): ?>
 	<div class="mc-popup-form">
 		<?php the_field('mc_popup_form', 'options'); ?>
 	</div>
 	<?php endif;*/