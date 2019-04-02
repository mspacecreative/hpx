<?php
/*
 * Plugin Name: Cookies Popup
 * Plugin URI: http://mspacecreative.com
 * Description: Shows info on the use of cookies
 * Version: 1.0
 * Author: Matt Cyr
 * Author URI: http://mspacecreative.com
 */
 
 function cookies_Styling() {
 	wp_enqueue_style( 'cookies-css', plugin_dir_url( __FILE__ ) . 'css/cookies.css', array(), null );
 	wp_enqueue_script( 'cookies-script', plugin_dir_url( __FILE__ ) . 'js/cookies.js', array(), null, true );
 }
 
 function cookies_Plugin() {
 		ob_start(); ?>
 			<div class="cookies">
 				<div class="cookies-inner clearfix">
 					<div class="cookies-content">
 						<p>We use cookies to enhance your experience. By continuing to visit this site you agree to our use of cookies.</p>
 						<a href="http://wikipedia.org/wiki/HTTP_cookie" target="_blank">More info &raquo;</a>
 					</div>
 					<button class="close-cookies">
 						<i class="fa fa-close"></i>
 					</button>
 				</div>
 			</div>
 		<?php echo ob_get_clean();
 }
 	
 add_action( 'wp_footer', 'cookies_Plugin' );
 add_action( 'wp_enqueue_scripts', 'cookies_Styling' );