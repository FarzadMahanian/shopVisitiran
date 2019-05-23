<?php
/**
 * Pranayama Yoga Theme Customizer.
 *
 * @package wedding_band
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
 
    $wedding_band_sections = array( 'slider', 'about', 'services', 'feature', 'story', 'blog', 'map', 'contactform' );
    
    $wedding_band_settings = array( 'info', 'default', 'home' );

   /* Option list of all post */	
    $wedding_band_options_posts = array();
    $wedding_band_options_posts_obj = get_posts('posts_per_page=-1');
    $wedding_band_options_posts[''] = __( 'Choose Post', 'wedding-band' );
    foreach ( $wedding_band_options_posts_obj as $posts ) {
    	$wedding_band_options_posts[$posts->ID] = $posts->post_title;
    }

    /* Option list of all page */   
    $wedding_band_options_pages = array();
    $wedding_band_options_pages_obj = get_posts('post_type=page&pages_per_page=-1');
    $wedding_band_options_pages[''] = __( 'Choose page', 'wedding-band' );
    foreach ( $wedding_band_options_pages_obj as $wedding_band_pages ) {
        $wedding_band_options_pages[$wedding_band_pages->ID] = $wedding_band_pages->post_title;
    }
    
    /* Option list of all categories */
    $args = array(
	   'type'                     => 'post',
	   'orderby'                  => 'name',
	   'order'                    => 'ASC',
	   'hide_empty'               => 1,
	   'hierarchical'             => 1,
	   'taxonomy'                 => 'category'
    ); 
    $wedding_band_option_categories = array();
    $category_lists = get_categories( $args );
    $wedding_band_option_categories[''] = __( 'Choose Category', 'wedding-band' );
    foreach( $category_lists as $category ){
        $wedding_band_option_categories[$category->term_id] = $category->name;
    }
     

    foreach( $wedding_band_settings as $setting ){
        require get_template_directory() . '/inc/customizer/' . $setting . '.php';
    }

    foreach( $wedding_band_sections as $section ){
        require get_template_directory() . '/inc/customizer/home/' . $section . '.php';
    }

    /**
     * Sanitization Functions
    */
    require get_template_directory() . '/inc/customizer/sanitization-functions.php';



    /**
     * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
     */
    function wedding_band_customize_preview_js() {
        wp_enqueue_script( 'wedding_band_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
    }
    add_action( 'customize_preview_init', 'wedding_band_customize_preview_js' );
