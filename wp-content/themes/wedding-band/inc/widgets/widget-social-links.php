<?php
/**
 * Widget Social Links
 *
 * @package Wedding Band
 */

// register wedding_band_Social_Links widget 
function wedding_band_register_social_links_widget() {
    register_widget( 'wedding_band_Social_Links' );
}
add_action( 'widgets_init', 'wedding_band_register_social_links_widget' );
 
 /**
 * Adds wedding_band_Social_Links widget.
 */
class wedding_band_Social_Links extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'wedding_band_social_links', // Base ID
			__( 'RARA: Social Links', 'wedding-band' ), // Name
			array( 'description' => __( 'A Social Links Widget.', 'wedding-band' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
	   
        $title       = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $facebook    = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '' ;
        $twitter     = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '' ;
        $pinterest   = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '' ;
        $linkedin    = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '' ;
        $google_plus = ! empty( $instance['google_plus'] ) ? esc_url( $instance['google_plus'] ) : '' ;
        $instagram   = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '' ;
        $youtube     = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '' ;		
        
        if( $facebook || $twitter || $pinterest || $linkedin || $google_plus || $instagram || $youtube ){ 
        echo $args['before_widget'];
        echo $args['before_title'] . apply_filters( 'widget_title', $title, $instance, $this->id_base ) . $args['after_title'];
        ?>
            <ul class="social-networks">
				<?php if( $facebook ){ ?>
                <li><a href="<?php echo esc_url( $facebook ); ?>" target="_blank" title="<?php esc_attr_e( 'Facebook', 'wedding-band' ); ?>" class="fa fa-facebook"></a></li>
				<?php } if( $twitter ){ ?>
                <li><a href="<?php echo esc_url( $twitter ); ?>" target="_blank" title="<?php esc_attr_e( 'Twitter', 'wedding-band' ); ?>" class="fa fa-twitter"></a></li>
				<?php } if( $pinterest ){ ?>
                <li><a href="<?php echo esc_url( $pinterest ); ?>" target="_blank" title="<?php esc_attr_e( 'Pinterest', 'wedding-band' ); ?>" class="fa fa-pinterest-p"></a></li>
				<?php } if( $linkedin ){ ?>
                <li><a href="<?php echo esc_url( $linkedin ); ?>" target="_blank" title="<?php esc_attr_e( 'Linkedin', 'wedding-band' ); ?>" class="fa fa-linkedin"></a></li>
				<?php } if( $google_plus ){ ?>
                <li><a href="<?php echo esc_url( $google_plus ); ?>" target="_blank" title="<?php esc_attr_e( 'Google Plus', 'wedding-band' ); ?>" class="fa fa-google-plus"></a></li>
				<?php } if( $instagram ){ ?>
                <li><a href="<?php echo esc_url( $instagram ); ?>" target="_blank" title="<?php esc_attr_e( 'Instagram', 'wedding-band' ); ?>" class="fa fa-instagram"></a></li>
				<?php } if( $youtube ){ ?>
                <li><a href="<?php echo esc_url( $youtube ); ?>" target="_blank" title="<?php esc_attr_e( 'YouTube', 'wedding-band' ); ?>" class="fa fa-youtube"></a></li>
                <?php } ?>
			</ul>
        <?php
        echo $args['after_widget'];
        }
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
        
        $title       = ! empty( $instance['title'] ) ? $instance['title'] : '';
        $facebook    = ! empty( $instance['facebook'] ) ? esc_url( $instance['facebook'] ) : '' ;
        $twitter     = ! empty( $instance['twitter'] ) ? esc_url( $instance['twitter'] ) : '' ;
        $pinterest   = ! empty( $instance['pinterest'] ) ? esc_url( $instance['pinterest'] ) : '' ;
        $linkedin    = ! empty( $instance['linkedin'] ) ? esc_url( $instance['linkedin'] ) : '' ;
        $google_plus = ! empty( $instance['google_plus'] ) ? esc_url( $instance['google_plus'] ) : '' ;
        $instagram   = ! empty( $instance['instagram'] ) ? esc_url( $instance['instagram'] ) : '' ;
        $youtube     = ! empty( $instance['youtube'] ) ? esc_url( $instance['youtube'] ) : '' ;
        		
        ?>
		
        <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php _e( 'Title', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'facebook' ); ?>"><?php _e( 'Facebook', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'facebook' ); ?>" name="<?php echo $this->get_field_name( 'facebook' ); ?>" type="text" value="<?php echo esc_url( $facebook ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'twitter' ); ?>"><?php _e( 'Twitter', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'twitter' ); ?>" name="<?php echo $this->get_field_name( 'twitter' ); ?>" type="text" value="<?php echo esc_url( $twitter ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'pinterest' ); ?>"><?php _e( 'Pinterest', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'pinterest' ); ?>" name="<?php echo $this->get_field_name( 'pinterest' ); ?>" type="text" value="<?php echo esc_url( $pinterest ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'linkedin' ); ?>"><?php _e( 'LinkedIn', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'linkedin' ); ?>" name="<?php echo $this->get_field_name( 'linkedin' ); ?>" type="text" value="<?php echo esc_url( $linkedin ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'google_plus' ); ?>"><?php _e( 'Google Plus', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'google_plus' ); ?>" name="<?php echo $this->get_field_name( 'google_plus' ); ?>" type="text" value="<?php echo esc_url( $google_plus ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'instagram' ); ?>"><?php _e( 'Instagram', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'instagram' ); ?>" name="<?php echo $this->get_field_name( 'instagram' ); ?>" type="text" value="<?php echo esc_url( $instagram ); ?>" />
		</p>
        
        <p>
            <label for="<?php echo $this->get_field_id( 'youtube' ); ?>"><?php _e( 'YouTube', 'wedding-band' ); ?></label> 
            <input class="widefat" id="<?php echo $this->get_field_id( 'youtube' ); ?>" name="<?php echo $this->get_field_name( 'youtube' ); ?>" type="text" value="<?php echo esc_url( $youtube ); ?>" />
		</p>

        <?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		
        $instance = array();
		
        $instance['title']       = ! empty( $new_instance['title'] ) ? sanitize_text_field( $new_instance['title'] ) : '';
        $instance['facebook']    = ! empty( $new_instance['facebook'] ) ? esc_url( $new_instance['facebook'] ) : '';
        $instance['twitter']     = ! empty( $new_instance['twitter'] ) ? esc_url( $new_instance['twitter'] ) : '';
        $instance['pinterest']   = ! empty( $new_instance['pinterest'] ) ? esc_url( $new_instance['pinterest'] ) : '';
        $instance['linkedin']    = ! empty( $new_instance['linkedin'] ) ? esc_url( $new_instance['linkedin'] ) : '';
        $instance['google_plus'] = ! empty( $new_instance['google_plus'] ) ? esc_url( $new_instance['google_plus'] ) : '';
        $instance['instagram']   = ! empty( $new_instance['instagram'] ) ? esc_url( $new_instance['instagram'] ) : '';
        $instance['youtube']     = ! empty( $new_instance['youtube'] ) ? esc_url( $new_instance['youtube'] ) : '';
	
        return $instance;
                
	}

} // class wedding_band_Social_Links 