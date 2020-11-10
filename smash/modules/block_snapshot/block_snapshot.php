<?php
function smash_block_snapshot($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $p = (!empty($args['snapshot'])) ? $args['snapshot'] : null;
    $extras = (array_key_exists('extras', $args)) ? $args['extras'] : false;

    if($p){ ?>
        <div class="snapshot <?php if($class){ echo $class; } ?>">
            <?php $products = (get_field('products', $p->ID)) ? get_field('products', $p->ID) : null; ?>
            <div class="post-item-image-wrap">
                <a href="<?php echo get_the_permalink($p->ID); ?>" class="post-item-image" data-bgratio="1.4" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/cover;"></a>
                <?php if(get_field('products', $p->ID)){ ?>
                    <div class="post-products-wrap">
                        <div class="post-products-trigger">
                            <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                            <span>Shop</span>
                        </div>
                        <div class="post-products">
                            <?php smash_single_products(['id' => $p->ID, 'products' => get_field('products', $p->ID), 'class' => 'small-slider']); ?>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?php if($extras){ ?>
                <div class="snapshot-body">
                    <?php $cats = get_the_terms(get_the_ID(), 'snapshot_category'); ?>
                    <h5 class="snapshot-category"><a href="<?php echo get_term_link($cats[0]->term_id); ?>"><?php echo $cats[0]->name; ?></a></h5>
                    <h3 class="snapshot-title"><a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a></h3>
                    <div class="snapshot-text">
                        <?php $e = get_the_excerpt($p->ID);
                        if($e){ echo wp_trim_words($e, 15); } ?>
                    </div>
                    <a href="<?php echo get_the_permalink($p->ID); ?>" class="snapshot-link animate-right">
                        View Post
                        <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                    </a>
                </div>
            <?php } ?>            
        </div>
    <?php }
}