<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_gallery_script', get_template_directory_uri() . '/smash/modules/slider_gallery/slider_gallery.js', array(), '1', true );
} );

function smash_slider_gallery($args = null) {
    $images = (!empty($args['images'])) ? $args['images'] : null;

    if($images){ ?>
        <div class="gallery-slider-wrapper slick-slider">
            <div class="gallery-slider">
                <?php foreach($images as $image) { ?>
                    <div class="gallery-slide">
                        <div class="gallery-slide-inner" data-bgratio="0.53">
                            <div class="gallery-image" data-bgratio="0.53" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;"></div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}