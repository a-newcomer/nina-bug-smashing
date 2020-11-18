<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_collection_script', get_template_directory_uri() . '/smash/modules/slider_collection/slider_collection.js', array(), '1', true );
} );

function smash_slider_collection($args = null) {
    $id = (!empty($args['id'])) ? $args['id'] : 0;
    $slides = (!empty($args['collections'])) ? $args['collections'] : null;

    if($slides){ ?>
        <!-- <div class="slider slider-x"></div> -->
        <!-- <div class="slider slider-nav"></div> -->
        <!-- <div class="slider slider-for"></div> -->

        <section class="collection-slider-wrapper slick-slider">
            <div class="collection-sliders">
                <div class="collection-slide">
                    <div class="collection-slide-inner">
                        <div id="collection_image_slider_<?php echo $id; ?>" data-collection="<?php echo 'collection_image_slider_'.$id; ?>" data-slider-nav=".slider-for-<?php echo $id; ?>,.slider-nav-<?php echo $id; ?>" class="collection-image-slider collection-slider slider-x slider-x-<?php echo $id; ?>">
                            <?php foreach($slides as $slide) { 
                                $image = ($slide['image']) ? $slide['image'] : null;
                                $title = ($slide['title']) ? $slide['title'] : null;
                                $text = ($slide['text']) ? $slide['text'] : null;
                                $link = ($slide['link']) ? $slide['link'] : '#';
                            ?>
                                <div class="collection-image slide" data-bgratio="0.64" style="background: url(<?php echo $image['url']; ?>) no-repeat center/cover;"></div>
                            <?php } ?>
                        </div>
                        <div id="collection_text_slider_<?php echo $id; ?>" data-collection="<?php echo 'collection_text_slider_'.$id; ?>" data-slider-nav=".slider-for-<?php echo $id; ?>,.slider-x-<?php echo $id; ?>" class="collection-body-slider collection-slider slider-nav slider-nav-<?php echo $id; ?>">
                            <?php foreach($slides as $slide) { 
                                $image = ($slide['image']) ? $slide['image'] : null;
                                $title = ($slide['title']) ? $slide['title'] : null;
                                $text = ($slide['text']) ? $slide['text'] : null;
                                $link = ($slide['link']) ? $slide['link'] : '#';
                            ?>
                                <div class="collection-body slide">
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
                            <?php } ?>
                        </div>
                        <div id="collection_sub_slider_<?php echo $id; ?>" data-count="<?php echo count($slides); ?>" data-collection="<?php echo 'collection_sub_slider_'.$id; ?>" data-slider-nav=".slider-nav-<?php echo $id; ?>,.slider-x-<?php echo $id; ?>" class="collection-image-sub-slider collection-slider slider-for slider-for-<?php echo $id; ?>">
                            <?php 
                            $length = count($slides);
                            moveElement($slides, 0, $length-1);
                            // $last = array_shift($slides);
                            // $subs = array_push($last);
                            // var_dump($slides);
                            foreach($slides as $slide) { 
                                $image = ($slide['image']) ? $slide['image'] : null;
                                $title = ($slide['title']) ? $slide['title'] : null;
                                $text = ($slide['text']) ? $slide['text'] : null;
                                $link = ($slide['link']) ? $slide['link'] : '#';
                            ?>
                                <div class="collection-image-sub slide" data-bgratio="1.16" style="background: url(<?php echo $image['url']; ?>) no-repeat center left/cover;"></div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}