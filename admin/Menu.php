<?php

/**
 * Menu class for create menu or add some columns and data on custom menu
 */
class Menu {
    public function __construct() {

        // add column
        add_filter( 'manage_r_simple_slider_posts_columns', array( $this, 'ss_thumbnail_column' ), 10, 1 );

        // add column data
        add_filter( 'manage_r_simple_slider_posts_custom_column', array( $this, 'ss_thumbnail_show' ), 10, 2 );

        // make column sortable
        add_filter( 'manage_edit-r_simple_slider_sortable_columns', array( $this, 'ss_custom_column_sortable' ), 10, 1 );

    }


    /**
     * Make sortable columns
     * 
     * @param array $sortable_columns
     * 
     * @return array
     */
    public function ss_custom_column_sortable($sortable_columns){
        
        $sortable_columns['slider_serial'] = 'slider_serial';


        return $sortable_columns;
    }

    public function ss_thumbnail_column($columns){

        $new_columns = [];

        foreach($columns as $key => $column ){


            if ( 'cb' == $key ) {
                $new_columns[$key] = $column;
                $new_columns['slider_image'] = 'Slider Image';
                continue;
            }

            if ( 'title' == $key ) {
                $new_columns[$key] = $column;
                $new_columns['slider_serial'] = 'Serial No';
                continue;
            }

            $new_columns[$key] = $column;

        }
        
        return $new_columns;
    }

    public function ss_thumbnail_show($col, $post_id){
        if('slider_image' === $col) {
            if(has_post_thumbnail($post_id)){
                echo get_the_post_thumbnail($post_id, array(100, 100));
            } else {
                echo 'No Image';
            }
        }

        if('slider_serial' === $col) {
            if(has_post_thumbnail($post_id)){
                echo get_post_meta($post_id, '_slider_serial', true);
            } else {
                echo ' ';
            }
        }
    }
}