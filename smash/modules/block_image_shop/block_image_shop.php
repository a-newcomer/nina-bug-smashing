<?php
function smash_block_image_shop($args = null) {
    $post_id = (!empty($args['post_id'])) ? $args['post_id'] : null;
    $class = (!empty($args['class'])) ? $args['class'] : null;
    $image = (!empty($args['image'])) ? $args['image'] : null;
    $ratio = (!empty($args['ratio'])) ? $args['ratio'] : 1.35;
    $products = (!empty($args['products'])) ? $args['products'] : null;

    if($image){ ?>
        <div class="post-item-image <?php echo $class; ?>" data-bgratio="<?php echo $ratio; ?>" style="background: url(<?php echo $image; ?>) no-repeat center/cover;">
            <?php if($products){ ?>
                <div class="post-products-wrap">
                    <div class="post-products-trigger">
                        <svg class="icon"><use xlink:href="#shopping-bag" /></svg>
                        <span>Shop</span>
                    </div>
                    <div class="post-products">
                        <?php smash_single_products(['id' => $post_id, 'products' => $products, 'class' => 'small-slider']); ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    <?php }
}