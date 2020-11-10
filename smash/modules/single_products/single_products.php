<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'single_products_script', get_template_directory_uri() . '/smash/modules/single_products/single_products.js', array(), '1', true );
} );

function smash_single_products($args = null) {
    $id = (!empty($args['id'])) ? $args['id'] : null;
    $class = (!empty($args['class'])) ? $args['class'] : 'large-slider';
    $products = (!empty($args['products'])) ? $args['products'] : null;

    if($products){ ?>
        <div id="products_slider_<?php echo $id; ?>" class="anchor post-product-slider-wrap entry-products-slider <?php echo $class; ?>">
            <?php foreach($products as $p) { ?>
                <?php smash_block_product(['product' => $p, 'title' => false, 'description' => false]); ?>
            <?php } ?>
        </div>
    <?php }
}