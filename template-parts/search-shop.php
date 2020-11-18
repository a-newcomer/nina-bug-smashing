<div id="shop_page">
    <section class="shop-search">
        <?php smash_block_custom_search(['form' => 'custom_shop_search_form']); ?>
    </section>
    
    <section class="products-grid-wrapper">
        <div class="product-grid container-xl flex-wrap align-start justify-center">
            <?php while ( have_posts() ) : the_post(); ?>
                <?php $p = get_post(get_the_ID());
                if($p){
                    smash_block_product(['class' => 'product-grid-item', 'product' => $p, 'description' => false]);
                } ?>
            <?php endwhile; ?>
        </div>

        <!-- Load More -->
        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_2" css_classes="product-grid container-xl flex-wrap align-start justify-center" post_type="product" search="'.get_search_query().'" posts_per_page="12" offset="12" pause="true" scroll="false" transition_container="false" button_label="Load More..."]'); ?>
    </section>
</div>