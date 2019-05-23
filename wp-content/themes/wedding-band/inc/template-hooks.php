<?php 
 /**
     * Doctype Hook
     * 
     * @see wedding_band_doctype_cb
    */
add_action( 'wedding_band_doctype', 'wedding_band_doctype_cb');

 /**
     * Before wp_head
     * 
     * @see wedding_band_head
    */

add_action( 'wedding_band_before_wp_head', 'wedding_band_head');

 /**
     * Page Start
     * 
     * @see wedding_band_page_start
    */

add_action( 'wedding_band_before_page_start','wedding_band_page_start');

 /**
     * Rara Academic Header
     * 
     * @see wedding_band_header_start - 10
     * @see wedding_band_main_header - 20
     * @see wedding_band_header_end - 30
     *
    */
add_action( 'wedding_band_header', 'wedding_band_header_start', 10 );
add_action( 'wedding_band_header', 'wedding_band_main_header', 20 );
add_action( 'wedding_band_header', 'wedding_band_header_end', 30 );

 /**
     * Page Header
     * 
     * @see wedding_band_page_header - 10
    */

add_action( 'wedding_band_after_header', 'wedding_band_page_header', 10 );

/** Content HOOKS goes here */

/**
 * Before Page entry content
 * 
 * @see wedding_band_page_content_image - 10
 * @see wedding_band_page_entry_header  - 20
*/
add_action( 'wedding_band_before_page_entry_content', 'wedding_band_page_content_image', 10 );
add_action( 'wedding_band_before_page_entry_content', 'wedding_band_page_entry_header', 20 );

/**
 * Before Post entry content
 * 
 * @see wedding_band_post_content_image - 10
 * @see wedding_band_post_entry_header  - 20
*/
add_action( 'wedding_band_before_post_entry_content', 'wedding_band_post_content_image', 10 );
add_action( 'wedding_band_before_post_entry_content', 'wedding_band_post_entry_header', 20 );

/**
 * After post content
 * 
 * @see wedding_band_post_author - 20
*/
add_action( 'wedding_band_after_post_content', 'wedding_band_post_author', 20 );

/**
 * Comment
 * 
 * @see wedding_band_get_comment_section 
*/
add_action( 'wedding_band_comment', 'wedding_band_get_comment_section' );

/**
    * Content End
    * 
    * @see wedding_band_content_end -20
*/

add_action( 'wedding_band_after_content', 'wedding_band_content_end', 20 );

 /**
     * Rara Academic Footer
     * 
     * @see wedding_band_footer_start - 10
     * @see wedding_band_footer_top - 20
     * @see wedding_band_footer_bottom - 30
     * @see wedding_band_footer_end - 40
    */

add_action( 'wedding_band_footer', 'wedding_band_footer_start', 10 );
add_action( 'wedding_band_footer', 'wedding_band_footer_top', 20 );
add_action( 'wedding_band_footer', 'wedding_band_footer_bottom', 30 );
add_action( 'wedding_band_footer', 'wedding_band_footer_end', 40 );

 /**
     * page start
     * 
     * @see wedding_band_page_end - 20
    */

add_action( 'wedding_band_after_footer', 'wedding_band_page_end', 20 );