<?php 


function smash_section_featured_posts_product($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : 'Top Sellers';
    $ctaText = (!empty($args['ctaText'])) ? $args['ctaText'] : 'shop now';
    $ctaLink = (!empty($args['ctaLink'])) ? $args['ctaLink'] : '#';
    $pids = (!empty($args['posts'])) ? $args['posts'] : null;

    if($pids) {
        $lp = new WP_Query([
            'post_type' => 'post',
            'post__in' => $pids,
        ]);

        if($lp->have_posts()) : ?>
            <section id="featured_posts_products">
                <div class="featured-posts-products-container flex align-center justify-between">
                    <div class="featured-posts-products-header flex-col align-start justify-center">
                        <div class="featured-posts-products-title"><?php echo $title; ?></div>
                        <div class="sep"></div>
                        <a href="<?php echo $ctaLink; ?>" class="featured-posts-products-cta"><?php echo $ctaText; ?></a>
                    </div>
                    <div class="featured-posts-products-wrap flex justify-between">
                        <?php while($lp->have_posts()) : $lp->the_post(); 
                            $bg = get_field('featured_product_background');
                        ?>
                            <a href="<?php the_field('featured_product_link'); ?>" target="_blank" class="featured-posts-product" data-bgratio="0.4" style="background: url(<?php echo $bg['sizes']['medium']; ?>) no-repeat center/cover;">
                                <div class="featured-product flex-col align-center justify-center">
                                    <?php if ( get_field('featured_product_thumb') ) : $image = get_field('featured_product_thumb'); ?>
                                        <img class="featured-product-thumb" src="<?php echo $image['sizes']['medium']; ?>">
                                    <?php endif; ?>
                                    <div class="sep"></div>
                                    <?php if ( get_field('featured_product_title') ) : ?>
                                        <div class="featured-product-title">
                                            <?php echo get_field('featured_product_title'); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </a>
                        <?php endwhile; wp_reset_query(); wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        <?php endif;
    }
}