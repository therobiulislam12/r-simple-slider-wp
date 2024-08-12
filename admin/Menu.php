<?php

/**
 * Menu class for create menu or add some columns and data on custom menu
 */
class Menu {
    public function __construct() {

        add_filter( 'manage_r_simple_slider_posts_columns', array( $this, 'ss_thumbnail_column' ), 10, 1 );

        add_filter( 'manage_r_simple_slider_posts_custom_column', array( $this, 'ss_thumbnail_show' ), 10, 2 );

    }

    public function ss_thumbnail_column($columns){

        $new_columns = [];

        foreach($columns as $key => $column ){


            if ( 'title' == $key ) {
                $new_columns[$key] = $column;
                $new_columns['slider_image'] = 'Slider Image';
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
    }
}