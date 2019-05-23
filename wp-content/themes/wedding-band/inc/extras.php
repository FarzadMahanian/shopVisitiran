<?php 

if ( ! function_exists( 'wedding_band_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function wedding_band_posted_on() {
  
  printf( '<span class="byline"><i class="fa fa-pencil"></i><span class="author vcard"><a class="url fn n" href="%1$s">%2$s</a></span></span>', esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ), esc_html( get_the_author() ) );
  printf( '<span class="posted-on"><i class="fa fa-calendar-o"></i><a href="%1$s" rel="bookmark"><time class="entry-date published updated" datetime="%2$s">%3$s</time></a></span>', esc_url( get_permalink() ), esc_attr( get_the_date() ), esc_html( get_the_date() ) );
  
  if ( 'post' === get_post_type() ) {
    /* translators: used between list items, there is a space after the comma */
    $categories_list = get_the_category_list( esc_html__( ', ', 'wedding-band' ) );
    if ( $categories_list && wedding_band_categorized_blog() ) {
      printf( '<span class="cat-links"><i class="fa fa-bookmark"></i>%1$s</span>', $categories_list ); // WPCS: XSS OK.
    }
  }

  if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
      echo '<span class="comments-link"><i class="fa fa-comments"></i>';
        /* translators: %s: post title */
         comments_popup_link( esc_html__( 'Leave a comment', 'wedding-band' ), esc_html__( '1 Comment', 'wedding-band' ), esc_html__( '% Comments', 'wedding-band' ) );
      echo '</span>';
  }

}
endif;

if ( ! function_exists( 'wedding_band_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function wedding_band_entry_footer() {
  // Hide category and tag text for pages.
  if ( 'post' === get_post_type() ) {
   
    /* translators: used between list items, there is a space after the comma */
    $tags_list = get_the_tag_list( '', esc_html__( ', ', 'wedding-band' ) );
    if ( $tags_list ) {
      printf( '<span class="tags-links">' . esc_html__( 'Tags:  %1$s', 'wedding-band' ) . '</span>', $tags_list ); // WPCS: XSS OK.
    }
  }

  edit_post_link(
    sprintf(
      /* translators: %s: Name of current post */
      esc_html__( 'Edit %s', 'wedding-band' ),
      the_title( '<span class="screen-reader-text">"', '"</span>', false )
    ),
    '<span class="edit-link">',
    '</span>'
  );
}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function wedding_band_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'wedding_band_categories' ) ) ) {
    // Create an array of all the categories that are attached to posts.
    $all_the_cool_cats = get_categories( array(
      'fields'     => 'ids',
      'hide_empty' => 1,
      // We only need to know if there is more than one category.
      'number'     => 2,
    ) );

    // Count the number of categories that are attached to the posts.
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'wedding_band_categories', $all_the_cool_cats );
  }

  if ( $all_the_cool_cats > 1 ) {
    // This blog has more than 1 category so wedding_band_categorized_blog should return true.
    return true;
  } else {
    // This blog has only 1 category so wedding_band_categorized_blog should return false.
    return false;
  }
}

/**
 * Return sidebar layouts for pages
*/
function wedding_band_sidebar_layout(){
    global $post;
    
    if( get_post_meta( $post->ID, 'wedding_band_sidebar_layout', true ) ){
        return get_post_meta( $post->ID, 'wedding_band_sidebar_layout', true );    
    }else{
        return 'right-sidebar';
    }
}

if( ! function_exists( 'wedding_band_pagination' ) ):

  function wedding_band_pagination(){
        
    if( is_single() ){
        the_post_navigation();
    }else{
          the_posts_pagination( array(
            'prev_text'   => __( '<<', 'wedding-band' ),
            'next_text'   => __( '>>', 'wedding-band' ),
            'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'wedding-band' ) . ' </span>',
          ) );
    }
  }

endif;

/**
 * Returns Section header
*/
function wedding_band_get_section_header( $title, $description ){
    if( $title || $description ){ ?>
        <div class="header-part">
            <?php 
                if( $title ) echo '<h2>' . esc_html( $title ) . '</h2>';
                if( $description ) echo wpautop( wp_kses_post( $description ) ); 
            ?>
        </div>
    <?php
    }
}

/**
 * Escape iframe
*/
function wedding_band_sanitize_iframe( $iframe ){
        
        $allow_tag = array(
            'iframe'=>array(
            'src'   => array()
            ) );
        
    return wp_kses( $iframe, $allow_tag );
    }