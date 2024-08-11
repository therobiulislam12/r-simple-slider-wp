<?php

/**
 * Plugin Name:       Simple Slider
 * Description:       Simple Slider for WP
 * Plugin URI:        #
 * Version:           1.0.0
 * Author:            Robiul Islam
 * Author URI:        https://robiul-islam.netlify.app
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Domain Path:       /languages
 * Text Domain:      s_slider
 */

class R_simple_slider_wp {

    public function __construct() {

        // short code
        add_shortcode( 'simple-slider', [$this, 'ss_shortcode'] );

        // activation hook
        register_activation_hook( __FILE__, [$this, 'active'] );

        // init hook
        add_action( 'init', array( $this, 'ss_register_slider_post_type' ) );

        // Script added hook
        add_action( 'wp_enqueue_scripts', [$this, 'ss_action_wp_enqueue_scripts'] );

        // Submenu added hook
        add_action( 'admin_menu', array( $this, 'ss_register_sub_menu' ) );
    }

    /**
     * Add submenu under the Slider Post Type
     * @return void
     */
    public function ss_register_sub_menu() {
        add_submenu_page( '/edit.php?post_type=r_simple_slider', 'Slide Settings', 'Settings', 'manage_options', 'r_ss_settings', [$this, 'r_ss_setting_page'] );
    }

    /**
     * Slider Setting page
     * @return void
     */
    public function r_ss_setting_page() {

        include_once __DIR__ . '/templates/settings-page.php';
    }

    /**
     * Fires when scripts and styles are enqueued.
     *
     */
    public function ss_action_wp_enqueue_scripts() {
        wp_enqueue_style( 'custom', plugins_url( '/assets/css/style.css', __FILE__ ), [], '1.0.0', 'all' );

        wp_enqueue_script( 'jr-carousel', plugins_url( '/assets/js/jr_carousel.min.js', __FILE__ ), ['jquery'], '1.0.0', true );
        wp_enqueue_script( 'main', plugins_url( '/assets/js/main.js', __FILE__ ), ['jquery'], '1.0.0', true );

        wp_localize_script( 'main', 'simpleSlider', [
            'width'            => get_option( 'simple_slider_width' ),
            'height'           => get_option( 'simple_slider_height' ),
            'design'           => get_option( 'simple_slider_design' ),
            'autoplay'         => get_option( 'simple_slider_autoplay' ),
            'control'          => get_option( 'simple_slider_control' ),
            'navigation_style' => get_option( 'simple_slider_navigation_style' ),
            'animation_style'  => get_option( 'simple_slider_animation_style' ),
            'duration'         => get_option( 'simple_slider_duration' ),
            'interval'         => get_option( 'simple_slider_interval' ),
        ] );
    }

    /**
     * Add Short Code for show slider data on page
     * @return mixed
     */
    public function ss_shortcode() {

        $design = get_option( 'simple_slider_design' );

        if ( '1' === $design ) {
            ob_start();
            include_once __DIR__ . '/templates/design-1.php';
            return ob_get_clean();
        } elseif ( '2' === $design ) {
            ob_start();
            include_once __DIR__ . '/templates/design-2.php';
            return ob_get_clean();
        } elseif ( '3' === $design ) {
            ob_start();
            include_once __DIR__ . '/templates/design-3.php';
            return ob_get_clean();
        } else {
            ob_start();
            include_once __DIR__ . '/templates/design-4.php';
            return ob_get_clean();
        }

    }

    /**
     * Create a simple post type slider
     * @return void
     */
    public function ss_register_slider_post_type() {
        $labels = array(
            'name'                  => _x( 'Slider', 'Post Type General Name', 's_slider' ),
            'singular_name'         => _x( 'Slider', 'Post Type Singular Name', 's_slider' ),
            'menu_name'             => __( 'Slider', 's_slider' ),
            'name_admin_bar'        => __( 'Slider', 's_slider' ),
            'archives'              => __( 'Item Archives', 's_slider' ),
            'attributes'            => __( 'Item Attributes', 's_slider' ),
            'parent_item_colon'     => __( 'Parent Item:', 's_slider' ),
            'all_items'             => __( 'All Slider', 's_slider' ),
            'add_new_item'          => __( 'Add New Slider', 's_slider' ),
            'add_new'               => __( 'Add New Slider', 's_slider' ),
            'new_item'              => __( 'New Slider', 's_slider' ),
            'edit_item'             => __( 'Edit Slider', 's_slider' ),
            'update_item'           => __( 'Update Slider', 's_slider' ),
            'view_item'             => __( 'View Slider', 's_slider' ),
            'view_items'            => __( 'View Slider', 's_slider' ),
            'search_items'          => __( 'Search Slider', 's_slider' ),
            'not_found'             => __( 'Not found Slider', 's_slider' ),
            'not_found_in_trash'    => __( 'Not found in Trash', 's_slider' ),
            'featured_image'        => __( 'Featured Image', 's_slider' ),
            'set_featured_image'    => __( 'Set featured image', 's_slider' ),
            'remove_featured_image' => __( 'Remove featured image', 's_slider' ),
            'use_featured_image'    => __( 'Use as featured image', 's_slider' ),
            'insert_into_item'      => __( 'Insert into Slider', 's_slider' ),
            'uploaded_to_this_item' => __( 'Uploaded to this item', 's_slider' ),
            'items_list'            => __( 'Items list', 's_slider' ),
            'items_list_navigation' => __( 'Items list navigation', 's_slider' ),
            'filter_items_list'     => __( 'Filter items list', 's_slider' ),
        );
        $args = array(
            'label'               => __( 'Slider', 's_slider' ),
            'description'         => __( 'Create a awesome slider', 's_slider' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'thumbnail' ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'menu_position'       => 20,
            'show_in_admin_bar'   => true,
            'show_in_nav_menus'   => true,
            'can_export'          => true,
            'has_archive'         => false,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'page',
            'show_in_rest'        => true,
            'menu_icon'           => "dashicons-embed-photo",
        );
        register_post_type( 'r_simple_slider', $args );
    }

    /**
     * when plugin active, call this method
     * data seeding here
     * @return void
     */
    public function active() {

        $options = [
            'installed'        => time(),
            'design'           => 1,
            'autoplay'         => 'false',
            'control'          => 'true',
            'height'           => 544,
            'width'            => 940,
            'navigation_style' => 'none',
            'animation_style'  => 'slide3d',
            'duration'         => 1900,
            'interval'         => 2000,
        ];

        foreach ( $options as $key => $value ) {
            $option_name = "simple_slider_{$key}";
            $existing_option = get_option( $option_name );

            if ( !$existing_option ) {
                update_option( $option_name, $value );
            }
        }

        update_option( 'simple_slider_version', '1.0.0' );
    }

}

new R_simple_slider_wp();
