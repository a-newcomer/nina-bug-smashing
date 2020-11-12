<div class="shop-nav">
    <div class="shop-nav-title"><span>Shop</span><svg class="icon"><use xlink:href="#down-angle" /></svg></div>
    <?php
        wp_nav_menu( array(
            'theme_location' 	=> 'shop',
            'menu_id'        	=> 'shop_menu',
            'menu_class'        => 'shop-menu',
            'container_id'	    => 'shop_menu_container',
            'container_class'	=> 'shop-menu-container',
        ) );
    ?>
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
        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_2" css_classes="product-grid flex-wrap align-start justify-center" post_type="product" posts_per_page="12" offset="12" pause="true" scroll="false" transition_container="false" button_label="view more..."]'); ?>
    <?php endif; wp_reset_query(); ?>
</div>