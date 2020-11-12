<div class="shop-nav">
    <?php if ( get_field('latest_title') ) : ?>
        <div class="shop-nav-title"><?php echo get_field('latest_title'); ?></div>
    <?php endif; ?>
    <?php if ( get_field('latest_cta') && get_field('latest_link') ) : ?>
        <a href="<?php echo get_field('latest_link'); ?>" class="shop-latest-cta animate-right">
            <?php echo get_field('latest_cta'); ?>
            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
        </a>
    <?php endif; ?>
</div>
<div class="shop-search">
    <?php smash_block_custom_search(['form' => 'custom_shop_search_form']); ?>
</div>
<div class="products-grid-wrapper">
    <?php 
    $lp = new WP_Query([
        'post_type' => 'product',
        'posts_per_page' => 8
    ]);
    if($lp->have_posts()) : ?>
        <div class="product-grid flex-wrap align-start justify-center">
            <?php while($lp->have_posts()) : $lp->the_post(); ?>
                <?php $p = get_post(get_the_ID());
                if($p){
                    smash_block_product(['class' => 'product-grid-item', 'product' => $p, 'description' => false]);
                } ?>
            <?php endwhile; ?>
        </div>
    <?php endif; wp_reset_query(); ?>
</div>