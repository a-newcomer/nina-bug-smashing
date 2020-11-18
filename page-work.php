<?php
/**
 * Template name: Work
 * 
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
            
                <div id="archive_page">
                    <?php smash_block_hero(['post' => $post]) ?>
                    <?php smash_under_header_block(['header' => get_field('headline_under_top_image'), 'text' => get_field('text_under_header_image')]) ?>
                </div>

                <?php   
                $args = array(
                    'post_type' => 'work',
                    'posts_per_page' => -1
                 );
                $workQ = new WP_Query($args); ?>

                <?php if($workQ->have_posts()) : ?>
                    <section id="projects">
                        <?php while($workQ->have_posts()) : $workQ->the_post(); ?>

                            <div class="rising-card project-card flex-col align-center">
                                <a class="img-box" href="<?php the_permalink(); ?>">
                                    <?php $backgroundImg = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
                                        <div class="featured-img" data-bgratio=".85" style="background: linear-gradient(rgba(0, 0, 0, 0.3),rgba(0, 0, 0, 0.3)), url('<?php echo $backgroundImg[0]; ?>') no-repeat center center; background-size: cover;">
                                        </div>
                                </a>
                                <h4><?php the_title(); ?></h4>
                            </div><!-- end .project-card -->

                        <?php endwhile; ?>
                    </section><!-- end #projects -->
                <?php endif; wp_reset_query(); ?>

		</main><!-- #main -->
	</div><!-- #primary -->
            <?php endif; ?>
<?php
get_footer();
//<div class="" data-bgratio="" style="background: url(<?php echo $image['sizes']['large']; ?>) no-repeat center/cover;"></div>
