<?php
/**
 * Template part for displaying snapshots
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package The_Parrish_Place
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    
    <div class="snapshot-post-wrapper">
        <div class="snapshot-post-inner container-lg">
            <div class="snapshot-image" data-bgratio="1.41" style="background: url(<?php the_post_thumbnail_url('large'); ?>) no-repeat center/cover;"></div>
            <div class="snapshot-body">
                <?php if ( get_field('label') ) : ?>
                    <h5 class="snapshot-label brush-bg"><?php echo get_field('label'); ?></h5>
                <?php endif; ?>
                <h2 class="snapshot-title"><?php the_title(); ?></h2>
                <div class="snapshot-content">
                    <?php the_content(); ?>
                </div>
                <?php if ( get_field('products') ) : $products = get_field('products'); ?>
                    <div class="snapshot-products">
                        <?php foreach($products as $product) { ?>
                            <?php smash_block_product(['class'=>'snapshot-product', 'description' => false, 'cta' => true, 'product' => $product]); ?>
                        <?php } ?>
                    </div>
                    <script>
                        jQuery(function($){
                            $('.snapshot-products').on('afterChange', function(slick, currentSlide){
                                scaleBgImages();
                            });
                            $('.snapshot-products').slick({
                                dots: false,
                                arrows: true,
                                prevArrow: '<div class="slick-prev slider-prev slider-arrow"><svg class="icon"><use xlink:href="#long-arrow-left" /></svg></div>',
                                nextArrow: '<div class="slick-next slider-next slider-arrow"><svg class="icon"><use xlink:href="#long-arrow-right" /></svg></div>',
                                infinite: true,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                            })

                            setTimeout(function(){
                                scaleBgImages();
                                // setupSlideLinks();
                            }, 500)
                        })
                    </script>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <div class="entry-footer">
        <div class="container-md">
            <div class="entry-footer-actions flex align-center justify-center">
                <a href="#comments" id="comment-btn" class="comment-btn flex align-center justify-center">Leave A Comment</a>
                <div class="dot-sep"></div>
                <?php smash_block_share_icons(['title' => 'Share The Post', 'post' => get_the_ID()]); ?>
            </div>
        </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->