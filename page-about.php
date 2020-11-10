<?php
/**
 * Template name: Nina Magon
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

	        <?php smash_block_hero(['post' => $post]) ?>
            <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
	
            <div id="about_page">
                <?php get_template_part( 'template-parts/content', 'page-about' ); ?>

            </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
