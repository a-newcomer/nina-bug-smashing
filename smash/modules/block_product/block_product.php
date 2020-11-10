<?php
function smash_block_product($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : 'basic';
    $brand = (array_key_exists('brand', $args)) ? $args['brand'] : true;
    $title = (array_key_exists('title', $args)) ? $args['title'] : true;
    $description = (array_key_exists('description', $args)) ? $args['description'] : true;
    $p = (!empty($args['product'])) ? $args['product'] : null;

    if($p){ ?>
        <div class="product <?php echo $class; ?>">
            <div class="product-wrap">
                <div class="product-image-wrap">
                    <img class="product-image" src="<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>" />
                    <?php if ( get_field('link', $p->ID) ) : ?>
                        <a href="<?php echo get_field('link', $p->ID); ?>" target="_blank" class="shop-btn btn btn-primary fade">Shop</a>
                    <?php endif; ?>
                </div>
                <div class="product-body">
                    <?php if ( $brand && get_field('brand',$p->ID) ) : ?>
                        <div class="product-brand">
                            <?php echo get_field('brand',$p->ID); ?>
                        </div>
                    <?php endif; ?>
                    <?php if($title){ ?>
                        <div class="product-title"><?php echo get_the_title($p->ID); ?></div>
                    <?php } ?>
                    <?php if ( $description && get_field('description',$p->ID) ) : ?>
                        <div class="product-description">
                            <?php echo get_field('description',$p->ID); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php }
}