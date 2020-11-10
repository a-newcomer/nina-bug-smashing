<?php
add_action( 'wp_enqueue_scripts', function(){
    wp_enqueue_script( 'section_shop_look_script', get_template_directory_uri() . '/smash/modules/section_shop_look/section_shop_look.js', array(), '1', true );
} );

function smash_section_shop_look($args = null) {
    $products = (!empty($args['products'])) ? $args['products'] : null;
    $title = (!empty($args['title'])) ? $args['title'] : null;
    $text = (!empty($args['text'])) ? $args['text'] : null;
    $cta = (!empty($args['cta'])) ? $args['cta'] : null;
    $link = (!empty($args['link'])) ? $args['link'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;

    if($products){ ?>
        <section class="shop-look">
            <div class="shop-look-container container-xl">
                <div class="shop-look-body">
                    <?php if($title){ ?>
                        <h2 class="shop-look-title"><?php echo $title; ?></h2>
                    <?php } ?>
                    <?php if($text){ ?>
                        <div class="shop-look-text">
                            <?php echo $text; ?>
                        </div>
                    <?php } ?>
                    <?php if($cta && $link){ ?>
                        <a href="<?php echo $link; ?>" class="shop-look-cta animate-right">
                            <?php echo $cta; ?>
                            <svg class="icon"><use xlink:href="#right-arrow" /></svg>
                        </a>
                    <?php } ?>
                </div>
                <div class="shop-look-products-wrap">
                    <?php if($image){ ?>
                        <div class="shop-look-image" data-bgratio="1.3" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
                    <?php } ?>
                    <div class="shop-look-products">
                        <?php foreach($products as $product) { ?>
                            <?php smash_block_product(['class' => 'product-grid-item', 'product' => $product, 'title' => false, 'description' => false]); ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </section>
    <?php }
}