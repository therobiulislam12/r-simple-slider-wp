<?php 

    $slider = new WP_Query([
        'post_type' => 'r_simple_slider'
    ]); 

?>

<div class="jR3DCarouselGalleryCustomeTemplate">
    <?php 
        if ($slider->have_posts()) :
        while ($slider->have_posts()) : $slider->the_post(); 
        
    ?>
        <div class="jR3DCarouselCustomSlide">
            <img src="<?php the_post_thumbnail_url(); ?>" />
        </div>

    <?php endwhile; 

        else :
        // Display a message if no posts were found
        echo '<p>No slides found.</p>'; 
    endif;?>
</div>