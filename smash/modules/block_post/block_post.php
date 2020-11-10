<?php
function smash_block_post($args = null) {
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $p = (!empty($args['post'])) ? $args['post'] : null;

    if($p){ ?>
        <div class="post-block <?php if($class){ echo $class; } ?>">
            <!-- We're not going to show product slider for posts -->
            <!-- <?php $products = (get_field('products')) ? get_field('products') : null; ?> -->
            <div class="post-item-image-wrap">
                <a href="<?php the_permalink(); ?>" class="post-item-image" data-bgratio="1" style="background: url(<?php echo get_the_post_thumbnail_url($p->ID, 'large'); ?>) no-repeat center/cover;"></a>
                
            </div>
            <!-- We don't need a reference to the first category of the post -->
            <!-- <?php $cats = get_the_category($p->ID);
            if($cats){ ?>
                <a class="post-block-cat" href="<?php echo get_term_link($cats[0]->term_id); ?>"><?php echo $cats[0]->name; ?></a>
            <?php } ?> -->
            <h5 class="post-block-title"><a href="<?php echo get_the_permalink($p->ID); ?>"><?php echo get_the_title($p->ID); ?></a></h5>
            <div class="post-block-text">
                <?php $e = get_the_excerpt($p->ID);
                if($e){ echo wp_trim_words($e, 15); } ?>
            </div>
            <a href="<?php echo get_the_permalink($p->ID); ?>" class="post-block-link animate-right">
                View Post
                <svg class="icon"><use xlink:href="#right-arrow" /></svg>
            </a>
        </div>
    <?php }
}