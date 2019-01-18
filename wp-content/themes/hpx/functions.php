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

// THUMBNAIL SIZING
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
	
	wp_register_style('para-styles', get_stylesheet_directory_uri() . '/js/dzsparallaxer/dzsparallaxer.css', array(), '1.0', 'all');
	wp_enqueue_style('para-styles');
	
	wp_register_style('animations', get_stylesheet_directory_uri() . '/css/animations.css', array(), '1.0', 'all');
	wp_enqueue_style('animations');
	
	wp_register_style('typekit', 'https://use.typekit.net/ese1iyj.css', array(), '1.0', 'all');
	wp_enqueue_style('typekit');
	
	
}

function footer_scripts() {
	
	wp_register_script('scripts', get_stylesheet_directory_uri() . '/js/scripts.js', array('jquery'), null, true);
	wp_enqueue_script('scripts');
	
	wp_register_script('animate', get_stylesheet_directory_uri() . '/js/css3-animate-it.js', array('jquery'), null, true);
	wp_enqueue_script('animate');
	
	wp_register_script('fontawesome', 'https://use.fontawesome.com/6ccd600e51.js', array('jquery'), null, true);
	wp_enqueue_script('fontawesome');
	
	wp_register_script('para-script', get_stylesheet_directory_uri() . '/js/dzsparallaxer/dzsparallaxer.js', array('jquery'), null, true);
	wp_enqueue_script('para-script');
}

/* ACF OPTIONS PAGE */
if( function_exists('acf_add_options_sub_page') ) {

	acf_add_options_sub_page('Footer');
	acf_add_options_sub_page('Call-out Box');
	acf_add_options_sub_page('Team Page');
	
}

/*function posts_sidebar() {
	register_sidebar( array(
		'name' => esc_html__( 'Blog Sidebar', 'ahbrsc' ),
		'id' => 'blog-sidebar',
		'before_widget' => '<div id="%1$s" class="et_pb_widget %2$s">',
		'after_widget' => '</div> <!-- end .et_pb_widget -->',
		'before_title' => '<h3 class="widgettitle">',
		'after_title' => '</h3>',
	) );
}*/

function remove_FooterArea6() {
	unregister_sidebar('sidebar-6');
	unregister_sidebar('sidebar-7');
}

// ARTISTS LOOP SHORTCODE
function artistsLoop() {
	ob_start();
		get_template_part('includes/loops/loop-artists');
	return ob_get_clean();
}

// SPONSOR LOGO ON HOME PAGE
function sponsorLogos() {
	ob_start();
		get_template_part('includes/sponsor-logos-home');
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
    );  
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
}

// ACTIONS, OPTIONS AND FILTERS
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
add_action('init', 'footer_scripts');
add_option( 'my_default_pic', get_stylesheet_directory_uri() . '/img/wood-frame-bg.jpg', '', 'yes' );
add_shortcode( 'artists_list', 'artistsLoop' );
add_shortcode( 'sponsor_logos_home', 'sponsorLogos' );
add_action( 'widgets_init', 'posts_sidebar' );
add_action( 'widgets_init', 'remove_FooterArea6', 11 );

// SHORTCODES
//add_shortcode('content_block', 'content_blocks');

// CUSTOM THUMBNAIL IN BACKEND
add_filter( 'image_size_names_choose', 'my_custom_sizes' );
// CUSTOM STYLES IN TINY MCE
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );