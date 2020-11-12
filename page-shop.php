<?php
/**
 * Template name: Shop
 * 
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

get_header();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php while ( have_posts() ) : the_post(); ?>
        <div id="shop_page">
                <div class="shop-inner">
                    <?php get_template_part( 'template-parts/content', 'page-shop' ); ?>
                </div>

                <!-- Shop Look -->
                <?php smash_section_shop_look(['title' => get_field('shop_look_title'), 'text' => get_field('shop_look_text'), 'cta' => get_field('shop_look_cta'), 'link' => get_field('shop_look_link'), 'image' => get_field('shop_look_image'), 'products' => get_field('shop_look_products')]); ?>

                <!-- Products Slider -->
                <?php smash_slider_featured_products(['title' => get_field('featured_products_title'), 'products' => get_field('featured_products')]); ?>

                <!-- Shop Hightlights -->
                <?php smash_section_shop_highlights(['title' => get_field('highlights_title'), 'image' => get_field('highlights_image'), 'products' => get_field('highlights_products'), 'cta' => get_field('highlights_cta'), 'link' => get_field('highlights_link')]); ?>

                <!-- LTKI -->
                <?php smash_section_ltki(['title' => get_field('ltki_title','option'), 'subtitle' => get_field('ltki_subtitle','option'), 'cta' => '@'.get_field('instagram_handle','option'), 'link' => get_field('instagram_link','option'), 'feed' => get_field('ltki_feed','option'), 'mobile' => get_field('ltki_feed_mobile','option')]); ?>

            </div>
		<?php endwhile; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
