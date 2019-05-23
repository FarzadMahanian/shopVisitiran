<?php
/**
 * Wedding Band functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Wedding_Band
 */

if ( ! function_exists( 'wedding_band_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function wedding_band_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Wedding Band, use a find and replace
	 * to change 'wedding-band' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'wedding-band', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );
    
    /** Custom Logo */
    add_theme_support( 'custom-logo', array(        
        'header-text' => array( 'site-title', 'site-description' ),
    ) );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'wedding-band' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'wedding_band_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	add_image_size( 'wedding-band-blog-thumb', 750, 450, true );
	add_image_size( 'wedding-band-banner-thumb', 1349, 674, true );
	add_image_size( 'wedding-band-widgets-thumb', 87, 72, true );
	add_image_size( 'wedding-band-blog-full-width-thumb', 1170, 450, true );
	add_image_size( 'wedding-band-about-thumb', 652, 350, true );
	add_image_size( 'wedding-band-story-thumb', 601, 557, true );
	add_image_size( 'wedding-band-home-blog-thumb', 360, 270, true );
	add_image_size( 'wedding-band-feature-thumb', 285, 370, true );
	add_image_size( 'wedding-band-feature-caption-thumb', 56, 56, true );
	add_image_size( 'wedding-band-feature-small-thumb', 285, 200, true );
}
endif;
add_action( 'after_setup_theme', 'wedding_band_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function wedding_band_content_width() {
    $GLOBALS['content_width'] = apply_filters( 'wedding_band_content_width', 750 );
}
/**
* Adjust content_width value according to template.
*
* @return void
*/
function wedding_band_template_redirect_content_width() {

    // Full Width in the absence of sidebar.
    if( is_page() ){
       $sidebar_layout = wedding_band_sidebar_layout();
       if( ( $sidebar_layout == 'no-sidebar' ) || ! ( is_active_sidebar( 'right-sidebar' ) ) ) $GLOBALS['content_width'] = 1170;
        
    }elseif( ! ( is_active_sidebar( 'right-sidebar' ) ) ) {
        $GLOBALS['content_width'] = 1170;
    }

}

/**
 * Enqueue scripts and styles.
 */
function wedding_band_scripts() {

	$query_args = array(
		'family' => 'Lato:400,900,700',
		);
	wp_enqueue_style( 'font-awesome', get_template_directory_uri(). '/css/font-awesome.css' );
	wp_enqueue_style( 'meanmenu', get_template_directory_uri(). '/css/meanmenu.css' );
    wp_enqueue_style( 'animate', get_template_directory_uri(). '/css/animate.css' );
    wp_enqueue_style( 'owl-carousel', get_template_directory_uri(). '/css/owl.carousel.css' );
    wp_enqueue_style( 'owl-theme-default', get_template_directory_uri(). '/css/owl.theme.default.css' );
	wp_enqueue_style( 'lightslider', get_template_directory_uri(). '/css/lightslider.css' );
	wp_enqueue_style( 'wedding-band-style', get_stylesheet_uri(), array(), WEDDING_BAND_THEME_VERSION );
	wp_enqueue_style( 'wedding-band-responsive-style', get_template_directory_uri(). '/css/responsive.css' );
	wp_enqueue_style( 'wedding-band-google-fonts', add_query_arg( $query_args, "//fonts.googleapis.com/css" ));
    wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array( 'jquery' ), '2.2.1', true );
	wp_enqueue_script( 'jquery-meanmenu', get_template_directory_uri() . '/js/jquery.meanmenu.js', array( 'jquery' ), '2.0.
        8', true );
    wp_enqueue_script( 'lightslider', get_template_directory_uri() . '/js/lightslider.js', array( 'jquery' ), '1.1.5', true );
    wp_enqueue_script( 'equal-height', get_template_directory_uri() . '/js/equal-height.js', array( 'jquery' ), '0.7.0', true );
    wp_enqueue_script( 'nice-scroll', get_template_directory_uri() . '/js/nice-scroll.js', array( 'jquery' ), '3.6.6', true );
	wp_enqueue_script( 'wedding-band-custom', get_template_directory_uri() . '/js/custom.js', array('jquery'), WEDDING_BAND_THEME_VERSION, true);
	
	$slider_auto      = get_theme_mod( 'wedding_band_slider_auto', '1' );
    $slider_loop      = get_theme_mod( 'wedding_band_slider_loop', '1' );
    $slider_animation = get_theme_mod( 'wedding_band_slider_animation', 'slide' );
    
    $array = array(
        'auto'      => esc_attr( $slider_auto ),
        'loop'      => esc_attr( $slider_loop ),
        'animation' => esc_attr( $slider_animation )
    );
    
    wp_localize_script( 'wedding-band-custom', 'wedding_band_data', $array );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

if( ! function_exists( 'wedding_band_customizer_js' ) ) :
/** 
 * Registering and enqueuing scripts/stylesheets for Customizer controls.
 */ 
function wedding_band_customizer_js() {
    wp_enqueue_style( 'wedding-band-customizer', get_template_directory_uri(). '/inc/css/customizer.css', WEDDING_BAND_THEME_VERSION );
    wp_enqueue_script( 'wedding-band-customizer-js', get_template_directory_uri() . '/inc/js/customizer.js', array('jquery'), WEDDING_BAND_THEME_VERSION, true  );
}
endif;
add_action( 'customize_controls_enqueue_scripts', 'wedding_band_customizer_js' );

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function wedding_band_body_classes( $classes ) {

   global $post;
   $ed_banner = get_theme_mod( 'wedding_band_ed_banner_section' );

    // Adds a class of group-blog to blogs with more than 1 published author.
    if ( is_multi_author() ) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if ( ! is_singular() ) {
        $classes[] = 'hfeed';
    }

    // Adds a class of custom-background-image to sites with a custom background image.
    if ( get_background_image() ) {
        $classes[] = 'custom-background-image';
    }

    // Adds a class of custom-background-color to sites with a custom background color.
    if ( get_background_color() != 'ffffff' ) {
        $classes[] = 'custom-background-color';
    }

     if( is_404() || !( is_active_sidebar( 'right-sidebar' ) ) ) {
        $classes[] = 'full-width'; 
    }
    
    if( is_page() ){
        $sidebar_layout = wedding_band_sidebar_layout();
        if( $sidebar_layout == 'no-sidebar' )
        $classes[] = 'full-width';
    }

    if( $ed_banner != true ){
        $classes[] = 'has-no-slider';
    }

    return $classes;
}

/**
 * Hook to move comment text field to the bottom in WP 4.4
 * 
 * @link http://www.wpbeginner.com/wp-tutorials/how-to-move-comment-text-field-to-bottom-in-wordpress-4-4/  
 */
function wedding_band_move_comment_field_to_bottom( $fields ) {
    $comment_field = $fields['comment'];
    unset( $fields['comment'] );
    $fields['comment'] = $comment_field;
    return $fields;
}

/**
 * Flush out the transients used in wedding_band_categorized_blog.
 */
function wedding_band_category_transient_flusher() {
  if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
    return;
  }
  // Like, beat it. Dig?
  delete_transient( 'wedding_band_categories' );
}

if ( ! function_exists( 'wedding_band_excerpt_more' ) && ! is_admin() ) :
    /**
    * Replaces "[...]" (appended to automatically generated excerpts) with ... * 
    */
    function wedding_band_excerpt_more() {
        return ' &hellip; ';
    }

endif;


if ( ! function_exists( 'wedding_band_excerpt_length' ) ) :
    /**
    * Changes the default 55 character in excerpt 
    */
    function wedding_band_excerpt_length( $length ) {
        return 20;
    }

endif;


if( ! function_exists( 'wedding_band_change_comment_form_default_fields' ) ) :
/**
 * Change Comment form default fields i.e. author, email & url.
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function wedding_band_change_comment_form_default_fields( $fields ){
    
    // get the current commenter if available
    $commenter = wp_get_current_commenter();
 
    // core functionality
    $req = get_option( 'require_name_email' );
    $aria_req = ( $req ? " aria-required='true'" : '' );    
 
    // Change just the author field
    $fields['author'] = '<p class="comment-form-author"><input id="author" name="author" placeholder="' . esc_attr__( 'Name*', 'wedding-band' ) . '" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['email'] = '<p class="comment-form-email"><input id="email" name="email" placeholder="' . esc_attr__( 'Email*', 'wedding-band' ) . '" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></p>';
    
    $fields['url'] = '<p class="comment-form-url"><input id="url" name="url" placeholder="' . esc_attr__( 'Website', 'wedding-band' ) . '" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="30" /></p>'; 
    
    return $fields;
    
}
endif;

if( ! function_exists( 'wedding_band_change_comment_form_defaults' ) ) :
/**
 * Change Comment Form defaults
 * https://blog.josemcastaneda.com/2016/08/08/copy-paste-hurting-theme/
*/
function wedding_band_change_comment_form_defaults( $defaults ){
    
    // Change the "cancel" to "I would rather not comment" and use a span instead
    $defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment"></label><textarea id="comment" name="comment" placeholder="' . esc_attr__( 'Comment', 'wedding-band' ) . '" cols="45" rows="8" aria-required="true"></textarea></p>';
    
    $defaults['label_submit'] = esc_attr__( 'Submit', 'wedding-band' );
    
    return $defaults;
    
}
endif;