<?php
/**
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

$current_cat = get_queried_object();
?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">
            <div id="shop_page" class="index">
                <div class="shop-inner">
                    <div class="shop-nav">
                        <div class="shop-nav-title">Shop Favorites</div>
                        <?php
                            wp_nav_menu( array(
                                'theme_location' 	=> 'shop',
                                'menu_id'        	=> 'shop_menu',
                                'menu_class'        => 'shop-menu flex-col align-start justify-start',
                                'container_id'	    => 'shop_menu_container',
                                'container_class'	=> 'shop-menu-container',
                            ) );
                        ?>
                    </div>
                    <div class="products-grid-wrapper">
                        <?php 
                        if(have_posts()) : ?>
                            <div class="product-grid flex-wrap align-start justify-center">
                                <?php while(have_posts()) : the_post(); ?>
                                    <?php $p = get_post(get_the_ID());
                                    if($p){
                                        smash_block_product(['class' => 'product-grid-item', 'product' => $p, 'description' => false]);
                                    } ?>
                                <?php endwhile; ?>
                            </div>
        
                            <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_2" css_classes="product-grid flex-wrap align-start justify-center" post_type="product" taxonomy="product_category" taxonomy_terms="'.$current_cat->slug.'" taxonomy_operator="IN" posts_per_page="12" offset="12" pause="true" scroll="false" transition_container="false" button_label="Load More..."]'); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
