<?php
/**
 * Template name: Collections
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
	
            <div id="collections_page">
                <?php smash_block_hero(['post' => $post]) ?>
                <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>

                <?php if ( have_rows('collections') ) : ?>
                    <div class="collections">
                        <?php while( have_rows('collections') ) : the_row(); ?>
                            <?php if( get_sub_field('collection_header') ) : ?>
                                <h3 class="collection-header"><?php echo get_sub_field('collection_header'); ?></h3>
                            <?php endif; ?>
                            <?php smash_slider_collection(['id' => get_row_index(), 'collections' => get_sub_field('collection')]); ?>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
                
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
