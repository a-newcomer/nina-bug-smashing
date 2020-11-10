<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_collection_script', get_template_directory_uri() . '/smash/modules/slider_collection/slider_collection.js', array(), '1', true );
} );

function smash_slider_collection($args = null) {
    $id = (!empty($args['id'])) ? $args['id'] : 0;
    $slides = (!empty($args['collections'])) ? $args['collections'] : null;

    if($slides){ ?>
        <div class="collection-slider-wrapper slick-slider">
            <div id="collection_slider_<?php echo $id; ?>" data-collection="<?php echo $id; ?>" class="collection-slider">
                <?php foreach($slides as $slide) { 
                    $image = ($slide['image']) ? $slide['image'] : null;
                    $title = ($slide['title']) ? $slide['title'] : null;
                    $text = ($slide['text']) ? $slide['text'] : null;
                    $link = ($slide['link']) ? $slide['link'] : '#';
                ?>
                    <div class="collection-slide">
                        <div class="collection-slide-inner">
                            <div class="collection-image" data-bgratio="0.64" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;"></div>
                            <div class="collection-body">
                                <?php if($title){ ?>
                                    <h4 class="collection-title"><?php echo $title; ?></h4>
                                <?php } ?>
                                <?php if($text){ ?>
                                    <div class="collection-text">
                                        <?php echo $text; ?>
                                    </div>
                                <?php } ?>
                                <a href="<?php echo $link; ?>" class="view-more">+ View In Detail</a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    <?php }
}