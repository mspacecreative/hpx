<?php

// CUSTOMIZE POST META DATA
if ( ! function_exists( 'et_divi_post_meta' ) ) :
function et_divi_post_meta() {
	$postinfo = is_single() ? et_get_option( 'divi_postinfo2' ) : et_get_option( 'divi_postinfo1' );

	if ( $postinfo ) :
		echo '<p class="post-meta">';
		echo _e('Posted '); echo et_pb_postinfo_meta( $postinfo, et_get_option( 'divi_date_format', 'M j, Y' ), esc_html__( '0 comments', 'Divi' ), esc_html__( '1 comment', 'Divi' ), '% ' . esc_html__( 'comments', 'Divi' ) );
		echo '</p>';
	endif;
}
endif;

// CUSTOM THUMBNAIL SIZING
if (function_exists('add_theme_support'))
{
    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size( 'headshot', 205, 205, array( 'center', 'center' ) );
    add_image_size( 'sponsorlogo', 300, 205, array( 'center', 'center' ) );
}
 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'headshot' => __( 'Head Shot' ),
        'sponsorlogo' => __( 'Sponsor Logo' ),
    ) );
}

/* MAIN STYLESHEET */
function my_theme_enqueue_styles() {

	$parent_style = 'parent-style';
	
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( $parent_style ));
	
	wp_register_style('typekit', 'https://use.typekit.net/ese1iyj.css', array(), '1.0', 'all');
	wp_enqueue_style('typekit');
	
}

// SCRIPTS IN FOOTER
function footer_scripts() {
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_enqueue_script( 'masonry-cdn', 'https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js', array( 'jquery' ), '1.0', true );
	wp_enqueue_script('masonry-cdn');
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
}

/* ACF OPTIONS PAGE */
if( function_exists('acf_add_options_sub_page') ) {

	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Sticky Navigation Bar');
	
}

// REMOVE EXTRA REGISTERED DIVI SIDEBARS
function remove_FooterArea6() {
	unregister_sidebar('sidebar-6');
	unregister_sidebar('sidebar-7');
}

// ARTISTS LOOP ON HOME PAGE
function artistsLoop() {
	ob_start();
		get_template_part('includes/loops/loop-artists');
	return ob_get_clean();
}

// ARTISTS LOOP ON LINEUP PAGE
function artistsLoopFull() {
	ob_start();
		get_template_part('includes/loops/loop-artists-full');
	return ob_get_clean();
}

// ARTISTS LOOP ON LINEUP PAGE – MASONRY STYLE
function artistsLoopFull2() {
	ob_start();
		get_template_part('includes/loops/loop-artists-full-2');
	return ob_get_clean();
}

// COMEDIANS LOOP ON INDEX PAGE
function comediansLoopFull() {
	ob_start();
		get_template_part('includes/loops/loop-comedians-full');
	return ob_get_clean();
}

// SPONSOR LOGO ON HOME PAGE
function sponsorLogos() {
	ob_start();
		get_template_part('includes/sponsor-logos-home');
	return ob_get_clean();
}

// SPONSOR LOGOS IN FOOTER
function sponsorLogosFooter() {
	ob_start();
		get_template_part('includes/sponsor-logos-footer');
	return ob_get_clean();
}

// SPONSOR LOGOS ON SPONSOR PAGE
function sponsorPageLogos() {
	ob_start();
		get_template_part('includes/sponsor-page-logos');
	return ob_get_clean();
}

// MAILCHIMP FORM
function mailChimpForm() {
	ob_start();
		get_template_part('includes/forms/mailchimp_form');
	return ob_get_clean();
}

// CUSTOM STYLES TO TINY MCE
function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}

function my_mce_before_init_insert_formats( $init_array ) {
 
    $style_formats = array(  

        array(  
            'title' => 'White CTA Button',  
            'block' => 'a',  
            'classes' => 'cta_button_light',
            'wrapper' => true,
             
        ),  
        array(  
            'title' => 'Green CTA Button',  
            'block' => 'a',  
            'classes' => 'cta_button',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Yellow Heading',  
            'block' => 'span',  
            'classes' => 'yellow-heading',
            'wrapper' => true,
        ),
    );  
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
}

// ACTIONS, OPTIONS AND FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'footer_scripts');
add_action( 'widgets_init', 'remove_FooterArea6', 11 );

// SHORTCODES
add_shortcode( 'artists_list', 'artistsLoop' );
add_shortcode( 'artists_list_full', 'artistsLoopFull' );
add_shortcode( 'artists_list_full_2', 'artistsLoopFull2' );
add_shortcode( 'comedian_list', 'comediansLoopFull' );
add_shortcode( 'sponsor_logos_home', 'sponsorLogos' );
add_shortcode( 'sponsor_page_logos', 'sponsorPageLogos' );
add_shortcode( 'mailchimp_form', 'mailChimpForm' );
add_shortcode( 'sponsor_logos_footer', 'sponsorLogosFooter' );

// CUSTOM THUMBNAIL IN BACKEND
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
// CUSTOM STYLES IN TINY MCE
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );