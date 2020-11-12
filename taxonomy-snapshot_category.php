<?php
/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nina_Magon
 */

get_header();
?>

    <div id="primary" class="content-area">
		<main id="main" class="site-main">

        <?php if ( have_posts() ) : ?>
        
            <section id="archive_page">
                <header class="container-xl page-header">
                    <?php the_archive_title( '<h1 class="page-title cat-title">', '</h1>' ); ?>			
                </header><!-- .page-header -->
    
                <div class="archive-bg">
    
                    <div class="archive-items container-lg">
    
                        <?php while ( have_posts() ) : the_post(); ?>
                            <?php 
                            $p = get_post(get_the_ID());
                            if($p){ 
                                smash_block_snapshot(['class' => 'archive-item', 'extras' => true, 'snapshot' => $p]); 
                            } ?>
                        <?php endwhile; ?>
    
                    </div>
    
                    <!-- Load More -->
                    <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_3" css_classes="archive-items container-lg" post_type="snapshot" taxonomy="snapshot_category" taxonomy_terms="'.$current_cat->slug.'" taxonomy_operator="IN" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More..."]'); ?>
                </div>
            </section>


		<?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
