<?php
if ( isset( $_POST['settings_save'] ) ) {
    $simple_slider = $_POST;

    foreach ( $simple_slider as $key => $value ) {
        // Sanitize the input
        $value = sanitize_text_field( $value );

        $option_name = "simple_slider_{$key}";

        // Update the option without checking if it already exists
        update_option( $option_name, $value );
    }
}
?>

<div class="wrap">
    <h2 class="page-title">Slider Settings</h2>

    <form action="" method="post">
        <table class="form-table">
        <tbody>

            <tr>
                <th scope="row">
                    <label for="slider-design"><?php _e( ' Copy Short Code :', 'ss_slider' );?></label>
                </th>
                <td>
                    <p> [ simple-slider ] </p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="slider-design"><?php _e( 'Slider Design :', 'ss_slider' );?></label>
                </th>
                <td>
                    <select name="design" id="default_slider_design">
                        <option value="1" <?php echo '1' === get_option( 'simple_slider_design' ) ? 'selected' : "" ?> >Design 1</option>
                        <option value="2" <?php echo '2' === get_option( 'simple_slider_design' ) ? 'selected' : "" ?> >Design 2</option>
                        <option value="3" <?php echo '3' === get_option( 'simple_slider_design' ) ? 'selected' : "" ?> >Design 3</option>
                        <option value="4" <?php echo '4' === get_option( 'simple_slider_design' ) ? 'selected' : "" ?> >Design 4</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="autoplay"><?php _e( 'Autoplay :', 'ss_slider' );?></label>
                </th>
                <td>
                    <select name="autoplay" id="default_autoplay">
                        <option value="false" <?php echo 'false' === get_option( 'simple_slider_autoplay' ) ? 'selected' : "" ?> >No</option>
                        <option value="true" <?php echo 'true' === get_option( 'simple_slider_autoplay' ) ? 'selected' : "" ?> >Yes</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="control"><?php _e( 'Control Button Show:', 'ss_slider' );?></label>
                </th>
                <td>
                    <select name="control" id="default_control">
                        <option value="control" <?php echo 'control' === get_option( 'simple_slider_control' ) ? 'selected' : "" ?>>Yes</option>
                        <option value="false" <?php echo 'false' === get_option( 'simple_slider_control' ) ? 'selected' : "" ?>>No</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="height"><?php _e( 'Height :', 'ss_slider' );?></label>
                </th>
                <td>
                    <input type="text" name="height" id="height" class="regular-text" value="<?php echo get_option( 'simple_slider_height' ); ?>">
                    <p class="description">Height Width Ratio must be 1.73 : 1</p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="width"><?php _e( 'Width :', 'ss_slider' );?></label>
                </th>
                <td>
                    <input type="text" name="width" id="width" class="regular-text" value="<?php echo get_option( 'simple_slider_width' ); ?>">
                    <p class="description">Height Width Ratio must be 1.73 : 1</p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="navigation_style"><?php _e( 'Navigation Style :', 'ss_slider' );?></label>
                </th>
                <td>
                    <select name="navigation_style" id="default_navigation">
                        <option <?php echo 'false' === get_option( 'simple_slider_navigation_style' ) ? 'selected' : "" ?> value=" ">None</option>
                        <option <?php echo 'circles' === get_option( 'simple_slider_navigation_style' ) ? 'selected' : "" ?> value="circles">Circle</option>
                        <option <?php echo 'squares' === get_option( 'simple_slider_navigation_style' ) ? 'selected' : "" ?> value="squares">Square</option>
                    </select>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="animation_style"><?php _e( 'Animation Style :', 'ss_slider' );?></label>
                </th>
                <td>
                    <select name="animation_style" id="default_animation">
                        <option <?php echo 'slide' === get_option( 'simple_slider_animation_style' ) ? 'selected' : "" ?> value="slide">Slide</option>
                        <option <?php echo 'slide3D' === get_option( 'simple_slider_animation_style' ) ? 'selected' : "" ?> value="slide3D">Slide 3D</option>
                        <option <?php echo 'fade' === get_option( 'simple_slider_animation_style' ) ? 'selected' : "" ?> value="fade">Fade</option>
                    </select>
                </td>
            </tr>


            <tr>
                <th scope="row">
                    <label for="duration"><?php _e( 'Animation Duration Time (ms) :', 'ss_slider' );?></label>
                </th>
                <td>
                    <input type="text" name="duration" id="animationDuration" class="regular-text" value="<?php echo get_option( 'simple_slider_duration' ); ?>">
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="interval"><?php _e( 'Animation Interval Time (ms) :', 'ss_slider' );?></label>
                </th>
                <td>
                    <input type="text" name="interval" id="animationInterval" class="regular-text" value="<?php echo get_option( 'simple_slider_interval' ); ?>">
                </td>
            </tr>
        </tbody>
    </table>

    <?php wp_nonce_field( 'slider-settings' );?>
    <?php submit_button( __( 'Save Changes', 'ss_slider' ), 'primary', 'settings_save' );?>
    </form>
</div>