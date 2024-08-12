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

    }

    /**
     * Create some meta boxes on custom post type
     * 
     * @return mixed
     */
    public function ss_simple_slider_meta_boxes(){
        add_meta_box( 
            'simple-slider-serial-number', 
            'Add Slider Serial Number', 
            array( $this, 'ss_serial_number' ), 
            'r_simple_slider'
        );
    }

    /**
     * Create Serial Number text input
     * @return void
     */
    public function ss_serial_number(){
        ?>
            <div class="inside">
                <p class="post-attributes-label-wrapper menu-order-label-wrapper">
                    <label class="post-attributes-label">Serial Number</label>
                </p>
                <input type="number" name="slider_number" value="">
            </div>
		<?php
    }

    public function ss_save_post_meta(){
        var_dump($_POST);
    }

}