<?php
/**
 * Template name: Snapshots
 * 
 * The template for displaying archive pages
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

        <?php if ( have_posts() ) : ?>

            <section id="archive_page">
                <header class="container-xl page-header">
                    <h1 class="page-title cat-title">All Snapshots</h1>
                </header><!-- .page-header -->
    
                <div class="archive-bg">

                    <?php 
                    $lp = new WP_Query([
                        'post_type' => 'snapshot',
                        'posts_per_page' => 12
                    ]);
                    if($lp->have_posts()) : ?>
                        <div class="archive-items container-lg">
                            <?php while($lp->have_posts()) : $lp->the_post(); ?>
                                <?php 
                                $p = get_post(get_the_ID());
                                if($p){ 
                                    smash_block_snapshot(['class' => 'archive-item', 'extras' => true, 'snapshot' => $p]); 
                                } ?>
                            <?php endwhile; ?>
                        </div>
                        
                        <!-- Load More -->
                        <?php echo do_shortcode('[ajax_load_more container_type="div" repeater="template_3" css_classes="archive-items container-lg" post_type="snapshot" posts_per_page="12" offset="12" pause="true" scroll="false" button_label="Load More..."]'); ?>
                    <?php endif; wp_reset_query(); ?>
    
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
