<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'slider_featured_products_script', get_template_directory_uri() . '/smash/modules/slider_featured_products/slider_featured_products.js', array(), '1', true );
} );

function smash_slider_featured_products($args = null) {
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $subtitle = (!empty($args['subtitle'])) ? $args['subtitle'] : null;
    $show_all_link = (!empty($args['show_all_link'])) ? $args['show_all_link'] : false;
    $justify = ($show_all_link) ? 'between' : 'center';
    $products = (!empty($args['products'])) ? $args['products'] : null;

    if($products){ ?>
        <section id="featured_products">
            <div class="featured-products-inner container-xl">
                <div class="featured-products-header-wrap flex align-center justify-<?php echo $justify; ?>">
                    <div class="featured-products-header">
                        <?php if($subtitle){ ?>
                            <h5 class="featured-products-subtitle"><?php echo $subtitle; ?></h5>
                        <?php } ?>
                        <?php if($title){ ?>
                            <h2 class="featured-products-title"><?php echo $title; ?></h2>
                        <?php } ?>
                    </div>

                    <?php if($show_all_link){ ?>
                        <a href="/shop" class="all-products-link animate-right">
                            Shop All
                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                        </a>
                    <?php } ?>
                </div>
                <div class="featured-products-slider">
                    <?php foreach($products as $product) { ?>
                        <?php smash_block_product(['class' => 'product-grid-item', 'product' => $product, 'description' => false]); ?>
                    <?php } ?>
                </div>
            </div>
        </section>
    <?php }
}