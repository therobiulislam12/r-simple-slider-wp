<?php

/**
 * Create custom meta box class
 *
 * Add r_simple_slider post type serial number
 */

class Custom_Meta_Box {

    /**
     *
     * Constructor method
     *
     */
    public function __construct() {

        // add meta box
        add_action( 'add_meta_boxes', array( $this, 'ss_simple_slider_meta_boxes' ) );

        // save meta data
        add_action( 'save_post_r_simple_slider', array( $this, 'ss_save_post_meta' ), 10, 1 );

    }

    /**
     * Create some meta boxes on custom post type
     *
     * @return mixed
     */
    public function ss_simple_slider_meta_boxes() {
        add_meta_box(
            'simple-slider-serial-number',
            'Add Slider Serial Number',
            array( $this, 'ss_serial_number' ),
            'r_simple_slider'
        );
    }

    /**
     * Create Serial Number text input
     * 
     * @param object $post
     * 
     * @return void
     */
    public function ss_serial_number( $post ) {

        $slider_serial_no = get_post_meta($post->ID, '_slider_serial', true);

        ?>
            <div class="inside">
                <p class="post-attributes-label-wrapper menu-order-label-wrapper">
                    <label class="post-attributes-label">Serial Number</label>
                </p>
                <input type="number" name="slider_number" value="<?php echo  $slider_serial_no ? $slider_serial_no : "" ?>">
            </div>
		<?php
}

    public function ss_save_post_meta($post_id) {
        if ( isset( $_POST['slider_number'] ) ) {
            $serial_no = sanitize_text_field( $_POST['slider_number'] ); 
            update_post_meta( $post_id, '_slider_serial', $serial_no );
        }
    }

}