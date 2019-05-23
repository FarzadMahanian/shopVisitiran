<?php
/**
 * WordPress Hooks
 *
 * @package wedding_band
 */
/**
 * @see wedding_band_setup
*/
add_action( 'after_setup_theme', 'wedding_band_setup' );

/**
 * @see wedding_band_content_width
*/
add_action( 'after_setup_theme', 'wedding_band_content_width', 0 );

/**
 * @see wedding_band_template_redirect_content_width
*/
add_action( 'template_redirect', 'wedding_band_template_redirect_content_width' );

/**
 * @see wedding_band_scripts
*/
add_action( 'wp_enqueue_scripts', 'wedding_band_scripts' );

/**
 * @see wedding_band_body_classes
*/
add_filter( 'body_class', 'wedding_band_body_classes' );

/**
 * @see wedding_band_category_transient_flusher
*/
add_action( 'edit_category', 'wedding_band_category_transient_flusher' );
add_action( 'save_post',     'wedding_band_category_transient_flusher' );

/**
 * Move comment field to the bottm
 * @see wedding_band_move_comment_field_to_bottom
*/
add_filter( 'comment_form_fields', 'wedding_band_move_comment_field_to_bottom' );

/**
 * @see wedding_band_excerpt_more
 * @see wedding_band_excerpt_length
*/
add_filter( 'excerpt_more', 'wedding_band_excerpt_more' );
add_filter( 'excerpt_length', 'wedding_band_excerpt_length', 999 );

/**
 * @see wedding_band_change_comment_form_default_fields
 * @see wedding_band_change_comment_form_defaults
*/
add_filter( 'comment_form_default_fields', 'wedding_band_change_comment_form_default_fields' );
add_filter( 'comment_form_defaults', 'wedding_band_change_comment_form_defaults' );